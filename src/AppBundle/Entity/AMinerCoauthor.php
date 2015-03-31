<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="aminer_coauthor")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class AMinerCoauthor
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="array", nullable=TRUE)
     */
    protected $affiliations;

    /**
     * @ORM\Column(type="integer")
     */
    protected $paper_count;

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
     * Set affiliations
     *
     * @param array $affiliations
     * @return AMinerCoauthor
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
     * @param integer $paperCount
     * @return AMinerCoauthor
     */
    public function setPaperCount($paperCount)
    {
        $this->paper_count = $paperCount;

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
     * (Add this method into your class)
     *
     * @return string String representation of this class
     */
    public function __toString()
    {
        return $this->name;
    }
}
