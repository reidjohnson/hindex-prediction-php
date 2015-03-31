<?php

namespace ODE\DatasetBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="paper_predictions")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class PaperPredictions
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
    protected $author1Pred;
}