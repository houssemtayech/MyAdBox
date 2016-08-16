<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionEvent
 *
 * @ORM\Table(name="action_event")
 * @ORM\Entity
 */
class ActionEvent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_event", type="integer", nullable=false)
     */
    private $idEvent;

    /**
     * @var \AdBoxBundle\Entity\Action
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AdBoxBundle\Entity\Action")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;



    /**
     * Set idEvent
     *
     * @param integer $idEvent
     * @return ActionEvent
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;

        return $this;
    }

    /**
     * Get idEvent
     *
     * @return integer 
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * Set id
     *
     * @param \AdBoxBundle\Entity\Action $id
     * @return ActionEvent
     */
    public function setId(\AdBoxBundle\Entity\Action $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AdBoxBundle\Entity\Action 
     */
    public function getId()
    {
        return $this->id;
    }
}
