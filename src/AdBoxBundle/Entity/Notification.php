<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notification
 *
 * @ORM\Table(name="notification")
 * @ORM\Entity
 */
class Notification
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="user_type", type="string", length=50, nullable=false)
     */
    private $userType;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="string", length=100, nullable=false)
     */
    private $message;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     */
    private $type;

    /**
     * @var \AdBoxBundle\Entity\Client
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AdBoxBundle\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

/**
    * @var \DateTime
    *
    * @ORM\Column(name="timestamp", type="datetime", nullable=false)
    */
   private $timestamp;
   
   function getTimestamp() {
       return $this->timestamp;
   }

   function setTimestamp(\DateTime $timestamp) {
       $this->timestamp = $timestamp;
   }
   
       /**
     * @var boolean
     *
     * @ORM\Column(name="isRead", type="boolean", nullable=false)
     */
    private $isRead;
    
    function getIsRead() {
        return $this->isRead;
    }

    function setIsRead($isRead) {
        $this->isRead = $isRead;
    }

        /**
     * Set idUser
     *
     * @param integer $idUser
     * @return Notification
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return integer 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set userType
     *
     * @param string $userType
     * @return Notification
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return string 
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return Notification
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
     * Set type
     *
     * @param string $type
     * @return Notification
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set id
     *
     * @param \AdBoxBundle\Entity\Client $id
     * @return Notification
     */
    public function setId(\AdBoxBundle\Entity\Client $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AdBoxBundle\Entity\Client 
     */
    public function getId()
    {
        return $this->id;
    }
}
