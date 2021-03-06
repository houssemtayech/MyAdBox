<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EventTimelaps
 *
 * @ORM\Table(name="event_timelaps", indexes={@ORM\Index(name="id_event", columns={"id_event"}), @ORM\Index(name="id_timelaps", columns={"id_timelaps"})})
 * @ORM\Entity
 */
class EventTimelaps
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AdBoxBundle\Entity\Timelaps
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Timelaps")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_timelaps", referencedColumnName="id")
     * })
     */
    private $idTimelaps;

    /**
     * @var \AdBoxBundle\Entity\Event
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_event", referencedColumnName="id")
     * })
     */
    private $idEvent;



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
     * Set idTimelaps
     *
     * @param \AdBoxBundle\Entity\Timelaps $idTimelaps
     * @return EventTimelaps
     */
    public function setIdTimelaps(\AdBoxBundle\Entity\Timelaps $idTimelaps = null)
    {
        $this->idTimelaps = $idTimelaps;

        return $this;
    }

    /**
     * Get idTimelaps
     *
     * @return \AdBoxBundle\Entity\Timelaps 
     */
    public function getIdTimelaps()
    {
        return $this->idTimelaps;
    }

    /**
     * Set idEvent
     *
     * @param \AdBoxBundle\Entity\Event $idEvent
     * @return EventTimelaps
     */
    public function setIdEvent(\AdBoxBundle\Entity\Event $idEvent = null)
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    /**
     * Get idEvent
     *
     * @return \AdBoxBundle\Entity\Event 
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }
}
