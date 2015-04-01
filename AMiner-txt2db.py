import codecs
import sqlite3
import sys

import MySQLdb

# =============================================================================
def Usage():
    print('Usage: AMiner-txt2db.py rdbms password')
    print('')
    sys.exit( 1 )
# =============================================================================

if len(sys.argv) < 1:
    Usage()

class Database():
    host = 'localhost'
    user = 'root'
    password = ''
    #db = 'hindex_pred'
    db ='app/hindex_pred.db'
    charset = 'utf8'
    use_unicode = True

    def __init__(self, password):
        self.password = password
        self.connection = sqlite3.connect(#self.host, 
                                          #self.user, 
                                          #self.password, 
                                          self.db#,
                                          #charset=self.charset,
                                          #use_unicode=self.use_unicode
                                          )
        self.cursor = self.connection.cursor()

    def insert(self, query, list):
        try:
            self.cursor.execute(query, list)
            self.connection.commit()
        except ValueError as e:
            self.connection.rollback()
            print e
            

    def query(self, query):
        cursor = self.connection.cursor(MySQLdb.cursors.DictCursor)
        cursor.execute(query)

        return cursor.fetchall()

    def __del__(self):
        self.connection.close()

def LoadAMinerPaper(db):
    count = 0
    with open('AMiner-Paper.txt', 'r') as f:
        paper = {}

        for line in f:
            if line == '\n':
                print '\n', paper, '\n'

                # Data Insert into the table
                columns = ', '.join(paper.keys())
                format = ', '.join(['%s'] * len(paper))
                query = "INSERT INTO aminer_paper (%s) VALUES (%s)" % (columns, format)

                try:
                    db.insert(query, paper.values())
                except db.connection.IntegrityError:
                    print "Duplicate entry. Continuing..."

                count += 1

                paper = {}
                continue

            line = line.rstrip().split(' ', 1)
            if len(line) < 2:
                continue

            # index id of this paper
            if line[0] == '#index':
                paper['id'] = int(line[1])
            # paper title
            elif line[0] == '#*':
                paper['title'] = str(line[1])
            # authors (separated by semicolons)
            elif line[0] == '#@':
                paper['authors'] = line[1]
            # affiliations (separated by semicolons, and each
            # affiliation corresponds to an author in order)
            elif line[0] == '#o':
                paper['affiliations'] = line[1]
            # year
            elif line[0] == '#t':
                paper['year'] = int(line[1])
            # publication venue
            elif line[0] == '#c':
                paper['venue'] = str(line[1])
            # the id of references of this paper (there are multiple 
            # lines, with each indicating a reference)
            elif line[0] == '#%':
                if not paper.has_key('refs'):
                    paper['refs'] = str(line[1])
                else:
                    paper['refs'] += ';' + str(line[1])
            # abstract
            elif line[0] == '#!':
                paper['abstract'] = str(line[1])

def LoadAMinerCoauthor(db):
    pass

def LoadAMinerAuthor(db):
    count = 0
    #with codecs.open('AMiner-Author.txt', encoding='utf-8') as f:
    with open('AMiner-Author.txt', 'r') as f:
        author = {}

        for line in f:
            if line == '\n':
                #print '\n', author, '\n'

                # Data Insert into the table
                columns = ', '.join(author.keys())
                format = ', '.join(['%s'] * len(author))
                query = "INSERT INTO aminer_author (%s) VALUES (%s)" % (columns, format)

                try:
                    db.insert(query, author.values())
                except db.connection.IntegrityError:
                    print "Duplicate entry. Continuing..."

                count += 1

                author = {}
                continue

            line = line.rstrip().split(' ', 1)
            if len(line) < 2:
                continue

            # index
            if line[0] == '#index':
                author['id'] = int(line[1])
            # name
            elif line[0] == '#n':
                #line[1] = "".join(str(e) for e in line[1])
                #line[1] = line[1].split(';')
                author['name'] = line[1]
            # affiliations
            elif line[0] == '#a':
                author['affiliations'] = str(line[1])
            # publication counts
            elif line[0] == '#pc':
                author['paper_count'] = int(line[1])
            # citation number
            elif line[0] == '#cn':
                author['citation_num'] = int(line[1])
            # h-index
            elif line[0] == '#hi':
                author['hindex'] = int(line[1])
            # p-index with equal a-index
            elif line[0] == '#pi':
                author['pindex'] = float(line[1])
            # p-index with unequal a-index
            elif line[0] == '#upi':
                author['upindex'] = float(line[1])
            # terms
            elif line[0] == '#t':
                author['terms'] = str(line[1])

def LoadAMinerPaperAuthor(db):
    count = 0
    
    table_name = 'aminer_paper_author'
    
    db.connection.text_factory = str
    
    # Data stored as collected in 2012
    with open('weka-2012-1-hindex.csv', 'r') as f:
        next(f) # skip header
        for line in f:
            line = line.rstrip().split(',')
            if len(line) < 6:
                continue

            author = {}

            #name
            author['name'] = sqlite3.Binary(str(line[0]))

            # number of publications
            sqrt_pubs = float(line[1]) # stored as the sqrt number of publications
            author['paper_count'] = round(pow(sqrt_pubs, 2))

            # first year of publication
            author['paper_start_year'] = 2015-(int(line[3])+3) # stored as years from 2012

            # h-index
            author['hindex2012'] = int(line[2])

            # h-index three years ago
            author['hindex2009'] = int(line[4])

            #print '\n', author, '\n'

            # Data Insert into the table
            columns = ', '.join(author.keys())
            format = ', '.join(['?'] * len(author))
            query = "INSERT INTO aminer_paper_author (%s) VALUES (%s)" % (columns, format)

            try:
                db.insert(query, author.values())
            except db.connection.IntegrityError:
                print "Duplicate entry. Continuing..."

            author = {}

            count += 1

def LoadAMinerVenue(db):
    pass

if __name__ == "__main__":
    password = ''

    # Parse command line arguments.
    i = 1
    while i < len(sys.argv):
        arg = sys.argv[i]

        if i == 1:
            password = arg

    db = Database(password)

    #LoadAMinerPaper(db)
    #LoadAMinerAuthor(db)
    LoadAMinerPaperAuthor(db)
    #LoadAMinerVenue(db)