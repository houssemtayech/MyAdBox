<?php

namespace AdBoxBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\InheritanceType("SINGLE_TABLE")
 *
 */
Abstract class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="CIN", type="integer", nullable=true)
     */
    private $cin;


    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255, nullable=true)
     */
    private $lastName;
    
    function getFirstName() {
        return $this->firstName;
    }

    function getLastName() {
        return $this->lastName;
    }

    function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    function setLastName($lastName) {
        $this->lastName = $lastName;
    }
    /**
     * Set cin
     *
     * @param integer $cin
     * @return User
     */
    public function setCin($cin)
    {
        $this->cin = $cin;

        return $this;
    }
    
        /**
     * Get cin
     *
     * @return integer 
     */
    public function getCin()
    {
        return $this->cin;
    }

   
    

    public function __construct() {
        parent::__construct();
        // your own logic
    }
    
   

}
