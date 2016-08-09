<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Timelaps
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Action_timelaps", mappedBy="timelaps")
     */
    private $actionTimelaps;

    /**
     * @ORM\OneToMany(targetEntity="Ad", mappedBy="timelaps")
     */
    private $ad;
}