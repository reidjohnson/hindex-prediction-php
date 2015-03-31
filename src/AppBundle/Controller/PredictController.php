<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PredictController extends Controller {

    public function createPredictionAction()
    {
        return $this->render('default/predict.html.twig');
    }

    public function predictAuthorAction()
    {
        // Dummy models of h-index (from years ahead 0-10).
        function dummyModel($a1, $a2, $a3)
        {
            $output = [];
            array_push($output, [0, $a3]);
            array_push($output, [1, $a3]);
            array_push($output, [2, $a3]);
            array_push($output, [3, $a3]);
            array_push($output, [4, $a3]);
            array_push($output, [5, $a3]);
            array_push($output, [6, $a3]);
            array_push($output, [7, $a3]);
            array_push($output, [8, $a3]);
            array_push($output, [9, $a3]);
            array_push($output, [10,$a3]);
            return $output;
        }

        $authors = $this->get('request')->query->get('authorSearch');

        $author_search = True;
        if ($authors === null) {
            $author_search = False;
        }

        $sqrtAuthorTotalPub = $this->get('request')->query->get('authorTotalPub');
        $authorFirstPub = $this->get('request')->query->get('authorFirstPub');
        $authorHindex = $this->get('request')->query->get('authorHindex');

        $em = $this->getDoctrine()->getManager();
        $rep = $em->getRepository('AppBundle:AMinerPaperAuthor');

        $output = [];
        if (sizeof($sqrtAuthorTotalPub) === sizeof($authorFirstPub) && sizeof($authorFirstPub) === sizeof($authorHindex)) {
            for($i=0; $i<sizeof($sqrtAuthorTotalPub); $i++) {
                $author_name = "Author " . intval($i+1);
                if ($author_search) {
                    $a = $rep->find($authors[$i]);
                    $author_name = $a->getName();
                }

                $a1 = sqrt(floatval($sqrtAuthorTotalPub[$i]));
                $a2 = intval(date("Y"))-intval($authorFirstPub[$i]);
                $a3 = intval($authorHindex[$i]);

                //$model = (new \Hindex_Hindex())->predictAuthor($a1, $a2, $a3);
                $model = dummyModel($a1, $a2, $a3);

                array_push($output, ['name' => $author_name, 'prediction' => $model]);
            }
        }

        return new Response(json_encode((object)$output));
    }

    public function predictPaperAction()
    {
        // Dummy model of paper contribution to h-index.
        function dummyModel($a)
        {
            $output = 1 / (0 + 1*$a[0] + 1*$a[1] + 1*$a[2] + 1*$a[3] + 1*$a[4] + 1*$a[5] + 1*$a[6]);
            return $output;
        }

        $em = $this->getDoctrine()->getManager();

        $paper_authors = $this->get('request')->query->get('paperAuthors');

        $num_authors = 0;
        //$first_paper_count = 0;
        //$first_hindex = 0;
        $primary_paper_count = 0;
        $primary_hindex = 0;
        $sum_hindex = 0;

        $author_array = [];
        $rep = $em->getRepository('AppBundle:AMinerPaperAuthor');
        foreach($paper_authors as $key => $author) {
            $a = $rep->find($author);
            /*
            if ($num_authors == 0) {
                $first_paper_count = $a->getPaperCount();
                $first_hindex = $a->getHindex2012();
            }
            */
            if ($a->getHindex2012() > $primary_hindex) {
                $primary_paper_count = $a->getPaperCount();
                $primary_hindex = $a->getHindex2012();
            }

            $sum_hindex += $a->getHindex2012();
            $num_authors += 1;

            array_push($author_array, $a);
        }

        $output = [];
        foreach ($author_array as $author) {
            // Author factors
            $a = [];
            array_push($a, $author->getHindex2012() / $primary_hindex);     // a_first_max
            array_push($a, ($sum_hindex / $num_authors) / $primary_hindex); // a_ave_max
            array_push($a, $sum_hindex / $primary_hindex);                  // a_sum_max
            array_push($a, $primary_hindex / $author->getPaperCount());     // a_first_ratio
            array_push($a, $primary_hindex / $primary_paper_count);         // a_max_ratio
            array_push($a, $num_authors);                                   // a_num_authors
            array_push($a, $author->getPaperCount());                       // a_num_first

            //$model = (new \Hindex_Hindex())->predictPaper($a);
            $model = dummyModel($a);
            array_push($output, ['name' => $author->getName(), 'prediction' => $model]);
        }

        return new Response(json_encode($output));
    }
}