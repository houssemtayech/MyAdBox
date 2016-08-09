<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Action_event extends Action
{
    /**
     * @ORM\OneToOne(targetEntity="Event", inversedBy="actionEvent")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id", unique=true)
     */
    private $event;
}