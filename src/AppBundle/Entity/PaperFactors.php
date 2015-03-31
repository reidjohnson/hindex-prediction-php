<?php

namespace ODE\DatasetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="paper_factors")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class PaperFactors
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $paperId;

    /**
     * @ORM\Column(type="float")
     */
    protected $a_first_max;

    /**
     * @ORM\Column(type="float")
     */
    protected $a_ave_max;

    /**
     * @ORM\Column(type="float")
     */
    protected $a_sum_max;

    /**
     * @ORM\Column(type="float")
     */
    protected $a_first_ratio;

    /**
     * @ORM\Column(type="float")
     */
    protected $a_max_ratio;

    /**
     * @ORM\Column(type="float")
     */
    protected $a_num_authors;

    /**
     * @ORM\Column(type="float")
     */
    protected $a_num_first;

    /**
     * @ORM\Column(type="float")
     */
    protected $c_popularity;

    /**
     * @ORM\Column(type="float")
     */
    protected $c_popularity_ratio;

    /**
     * @ORM\Column(type="float")
     */
    protected $c_novelty;

    /**
     * @ORM\Column(type="float")
     */
    protected $c_diversity;

    /**
     * @ORM\Column(type="float")
     */
    protected $c_authority_first;

    /**
     * @ORM\Column(type="float")
     */
    protected $c_authority_max;

    /**
     * @ORM\Column(type="float")
     */
    protected $c_authority_ave;

    /**
     * @ORM\Column(type="float")
     */
    protected $v_ratio_max;

    /**
     * @ORM\Column(type="float")
     */
    protected $v_citation;

    /**
     * @ORM\Column(type="float")
     */
    protected $s_degree;

    /**
     * @ORM\Column(type="float")
     */
    protected $s_pagerank;

    /**
     * @ORM\Column(type="float")
     */
    protected $s_h_coauthor;

    /**
     * @ORM\Column(type="float")
     */
    protected $s_h_weight;

    /**
     * @ORM\Column(type="float")
     */
    protected $r_ratio_max;

    /**
     * @ORM\Column(type="float")
     */
    protected $r_citation;

    /**
     * @ORM\Column(type="float")
     */
    protected $t_ave_h;

    /**
     * @ORM\Column(type="float")
     */
    protected $t_max_h;

    /**
     * @ORM\Column(type="float")
     */
    protected $t_h_first;

    /**
     * @ORM\Column(type="float")
     */
    protected $t_h_max;
}