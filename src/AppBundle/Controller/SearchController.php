<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class SearchController extends Controller {

    public function searchAjaxAuthorAction()
    {
        $em = $this->getDoctrine()->getManager();

        $term = $this->get('request')->query->get('q');
        $limit = $this->get('request')->query->get('limit', 1);

        /*$rep = $em->getRepository('AppBundle:AMinerAuthor');

        if ($term) {
            $entities = $rep->createQueryBuilder('m')
                ->where('m.name LIKE ?1')
                ->orderBy('m.hindex', 'DESC')
                ->setParameter('1','%'.$term.'%')
                ->setMaxResults($limit)
                ->getQuery();
        } else {
            $entities = $rep->createQueryBuilder('m')
                ->groupBy('m.name')
                ->orderBy('m.hindex', 'DESC')
                ->setMaxResults(25)
                ->getQuery();
        }

        $entities = $entities->execute();

        $json = array();
        $total = 0;
        foreach($entities as $entity) {
            if($entity->getName()) {
                $json[] = array(
                    'id' => $entity->getId(),
                    'name' => $entity->getName(),
                    'affiliations' => $entity->getAffiliations(),
                    'paperCount' => $entity->getPaperCount(),
                    'citationNum' => $entity->getCitationNum(),
                    'hindex' => $entity->getHindex(),
                    'pindex' => $entity->getPindex(),
                    'terms' => $entity->getTerms(),
                    'upindex' => $entity->getUPindex()
                );
                $total++;
            }
        }*/

        $rep = $em->getRepository('AppBundle:AMinerPaperAuthor');

        if ($term) {
            $entities = $rep->createQueryBuilder('m')
                ->where('m.name LIKE ?1')
                ->orderBy('m.hindex2012', 'DESC')
                ->setParameter('1','%'.$term.'%')
                ->setMaxResults($limit)
                ->getQuery();
        } else {
            $entities = $rep->createQueryBuilder('m')
                ->groupBy('m.name')
                ->orderBy('m.hindex2012', 'DESC')
                ->setMaxResults(25)
                ->getQuery();
        }

        $entities = $entities->execute();

        $json = array();
        $total = 0;
        foreach($entities as $entity) {
            if($entity->getName()) {
                $json[] = array(
                    'id' => $entity->getId(),
                    'name' => $entity->getName(),
                    'paperCount' => $entity->getPaperCount(),
                    'paperStartYear' => $entity->getPaperStartYear(),
                    'hindex2009' => $entity->getHindex2009(),
                    'hindex2012' => $entity->getHindex2012()
                );
                $total++;
            }
        }

        return $this->render('default/search.paperauthor.json.twig'
            , array(
                'entities'  => $entities
                //,'callback' => $callback
                ,'total'    => $total
            )
        );
    }

    public function searchAjaxPaperAction()
    {
        $em = $this->getDoctrine()->getManager();

        $term = $this->get('request')->query->get('q');
        $limit = $this->get('request')->query->get('limit', 1);

        $rep = $em->getRepository('AppBundle:AMinerPaper');

        if ($term) {
            $entities = $rep->createQueryBuilder('m')
                ->where('m.title LIKE ?1')
                //->orderBy('m.year', 'DESC')
                ->setParameter('1','%'.$term.'%')
                ->setMaxResults($limit)
                ->getQuery();
        } else {
            $entities = $rep->createQueryBuilder('m')
                ->groupBy('title.name')
                //->orderBy('m.year', 'DESC')
                ->setMaxResults(25)
                ->getQuery();
        }

        $entities = $entities->execute();

        $json = array();
        $total = 0;
        foreach($entities as $entity) {
            if($entity->getName()) {
                $json[] = array(
                    'id' => $entity->getId(),
                    'title' => $entity->getTitle(),
                    'authors' => $entity->getAuthors(),
                    'affiliations' => $entity->getAffiliations(),
                    'year' => $entity->getYear(),
                    'venue' => $entity->getVenue(),
                    'refs' => $entity->getRefs(),
                    'abstract' => $entity->geAbstract()
                );
                $total++;
            }
        }

        return $this->render('default/search.paper.json.twig'
            , array(
                'entities'  => $entities
                //,'callback' => $callback
                ,'total'    => $total
            )
        );
    }
}