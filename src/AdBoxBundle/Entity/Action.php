<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action")
 * @ORM\Entity
 */
class Action
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false)
     */
    private $timestamp;

    /**
     * @var string
     *
     * @ORM\Column(name="action_type", type="string", length=100, nullable=false)
     */
    private $actionType;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_admin", type="integer", nullable=false)
     */
    private $idAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=500, nullable=false)
     */
    private $message;

    /**
     * @var \AdBoxBundle\Entity\Admin
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AdBoxBundle\Entity\Admin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;



    /**
     * Set timestamp
     *
     * @param \DateTime $timestamp
     * @return Action
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    /**
     * Get timestamp
     *
     * @return \DateTime 
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * Set actionType
     *
     * @param string $actionType
     * @return Action
     */
    public function setActionType($actionType)
    {
        $this->actionType = $actionType;

        return $this;
    }

    /**
     * Get actionType
     *
     * @return string 
     */
    public function getActionType()
    {
        return $this->actionType;
    }

    /**
     * Set idAdmin
     *
     * @param integer $idAdmin
     * @return Action
     */
    public function setIdAdmin($idAdmin)
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }

    /**
     * Get idAdmin
     *
     * @return integer 
     */
    public function getIdAdmin()
    {
        return $this->idAdmin;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Action
     */
    public function setMessage($message)
    {
        $this->message = $message;

        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set id
     *
     * @param \AdBoxBundle\Entity\Admin $id
     * @return Action
     */
    public function setId(\AdBoxBundle\Entity\Admin $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AdBoxBundle\Entity\Admin 
     */
    public function getId()
    {
        return $this->id;
    }
}
