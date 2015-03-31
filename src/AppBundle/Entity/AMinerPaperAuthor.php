<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="aminer_paper_author")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class AMinerPaperAuthor
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
     * @ORM\Column(type="integer", nullable=TRUE)
     */
    protected $paper_count;

    /**
     * @ORM\Column(type="integer", nullable=TRUE)
     */
    protected $paper_start_year;

    /**
     * @ORM\Column(type="integer", nullable=TRUE)
     */
    protected $hindex2009;

    /**
     * @ORM\Column(type="integer", nullable=TRUE)
     */
    protected $hindex2012;

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
     * @return AMinerPaperAuthor
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
     * Set paper_count
     *
     * @param integer $paper_count
     * @return AMinerPaperAuthor
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
     * Set paper_start_year
     *
     * @param integer $paper_start_year
     * @return AMinerPaperAuthor
     */
    public function setPaperStartYear($paper_start_year)
    {
        $this->$paper_start_year = $paper_start_year;

        return $this;
    }

    /**
     * Get paper_start_year
     *
     * @return integer
     */
    public function getPaperStartYear()
    {
        return $this->paper_start_year;
    }

    /**
     * Set hindex2009
     *
     * @param integer $hindex2009
     * @return AMinerPaperAuthor
     */
    public function setHindex2009($hindex2009)
    {
        $this->hindex2009 = $hindex2009;

        return $this;
    }

    /**
     * Get hindex2009
     *
     * @return integer
     */
    public function getHindex2009()
    {
        return $this->hindex2009;
    }

    /**
     * Set hindex
     *
     * @param integer $hindex2012
     * @return AMinerPaperAuthor
     */
    public function setHindex2012($hindex2012)
    {
        $this->hindex = $hindex2012;

        return $this;
    }

    /**
     * Get hindex2012
     *
     * @return integer
     */
    public function getHindex2012()
    {
        return $this->hindex2012;
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
