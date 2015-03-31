<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="aminer_author")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class AMinerAuthor
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     */
    protected $name;

    /**
     * @ORM\Column(type="text", nullable=TRUE)
     */
    protected $affiliations;

    /**
     * @ORM\Column(type="integer", nullable=TRUE)
     */
    protected $paper_count;

    /**
     * @ORM\Column(type="integer", nullable=TRUE)
     */
    protected $citation_num;

    /**
     * @ORM\Column(type="integer", nullable=TRUE)
     */
    protected $hindex;

    /**
     * @ORM\Column(type="float", nullable=TRUE)
     */
    protected $pindex;

    /**
     * @ORM\Column(type="float", nullable=TRUE)
     */
    protected $upindex;

    /**
     * @ORM\Column(type="text", nullable=TRUE)
     */
    protected $terms;

    // --------------------//
    // Getters and Setters //
    // --------------------//

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param text $name
     * @return AMinerAuthor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return text
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set affiliations
     *
     * @param array $affiliations
     * @return AMinerAuthor
     */
    public function setAffiliations($affiliations)
    {
        $this->affiliations = $affiliations;

        return $this;
    }

    /**
     * Get affiliations
     *
     * @return array 
     */
    public function getAffiliations()
    {
        return $this->affiliations;
    }

    /**
     * Set paper_count
     *
     * @param integer $paper_count
     * @return AMinerAuthor
     */
    public function setPaperCount($paper_count)
    {
        $this->paper_count = $paper_count;

        return $this;
    }

    /**
     * Get paper_count
     *
     * @return integer 
     */
    public function getPaperCount()
    {
        return $this->paper_count;
    }

    /**
     * Set citation_num
     *
     * @param integer $citation_num
     * @return AMinerAuthor
     */
    public function setCitationNum($citation_num)
    {
        $this->citation_num = $citation_num;

        return $this;
    }

    /**
     * Get citation_num
     *
     * @return integer 
     */
    public function getCitationNum()
    {
        return $this->citation_num;
    }

    /**
     * Set hindex
     *
     * @param integer $hindex
     * @return AMinerAuthor
     */
    public function setHindex($hindex)
    {
        $this->hindex = $hindex;

        return $this;
    }

    /**
     * Get hindex
     *
     * @return integer 
     */
    public function getHindex()
    {
        return $this->hindex;
    }

    /**
     * Set pindex
     *
     * @param float $pindex
     * @return AMinerAuthor
     */
    public function setPindex($pindex)
    {
        $this->pindex = $pindex;

        return $this;
    }

    /**
     * Get pindex
     *
     * @return float
     */
    public function getPindex()
    {
        return $this->pindex;
    }

    /**
     * Set upindex
     *
     * @param float $upindex
     * @return AMinerAuthor
     */
    public function setUPindex($upindex)
    {
        $this->upindex = $upindex;

        return $this;
    }

    /**
     * Get upindex
     *
     * @return float
     */
    public function getUPindex()
    {
        return $this->upindex;
    }

    /**
     * Set terms
     *
     * @param array $terms
     * @return AMinerAuthor
     */
    public function setTerms($terms)
    {
        $this->terms = $terms;

        return $this;
    }

    /**
     * Get terms
     *
     * @return array 
     */
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     *
     *
     * @return string String representation of this class
     */
    public function __toString()
    {
        return $this->name;
    }
}
