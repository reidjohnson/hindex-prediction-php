<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="aminer_paper")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class AMinerPaper
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $title;

    /**
     * @ORM\Column(type="array", nullable=TRUE)
     */
    protected $authors;

    /**
     * @ORM\Column(type="array", nullable=TRUE)
     */
    protected $affiliations;

    /**
     * @ORM\Column(type="integer")
     */
    protected $year;

    /**
     * @ORM\Column(type="text")
     */
    protected $venue;

    /**
     * @ORM\Column(type="array", nullable=TRUE)
     */
    protected $refs;

    /**
     * @ORM\Column(type="text", nullable=TRUE)
     */
    protected $abstract;

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
     * Set title
     *
     * @param string $title
     * @return AMinerPaper
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set authors
     *
     * @param array $authors
     * @return AMinerPaper
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;

        return $this;
    }

    /**
     * Get authors
     *
     * @return array
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * Set affiliations
     *
     * @param array $affiliations
     * @return AMinerPaper
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
     * Set year
     *
     * @param integer $year
     * @return AMinerPaper
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set venue
     *
     * @param string $venue
     * @return AMinerPaper
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;

        return $this;
    }

    /**
     * Get venue
     *
     * @return string
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * Set refs
     *
     * @param array $refs
     * @return AMinerPaper
     */
    public function setRefs($refs)
    {
        $this->refs = $refs;

        return $this;
    }

    /**
     * Get refs
     *
     * @return array
     */
    public function getRefs()
    {
        return $this->refs;
    }

    /**
     * Set abstract
     *
     * @param string $abstract
     * @return AMinerPaper
     */
    public function setAbstract($abstract)
    {
        $this->abstract = $abstract;

        return $this;
    }

    /**
     * Get abstract
     *
     * @return string
     */
    public function getAbstract()
    {
        return $this->abstract;
    }
}