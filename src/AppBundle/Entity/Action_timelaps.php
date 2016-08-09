<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Action_timelaps extends Action
{
    /**
     * @ORM\ManyToOne(targetEntity="Timelaps", inversedBy="actionTimelaps")
     * @ORM\JoinColumn(name="timelaps_id", referencedColumnName="id")
     */
    private $timelaps;
}