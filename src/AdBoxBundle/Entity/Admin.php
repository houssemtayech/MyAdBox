<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Admin extends User
{
    /**
     * @var string
     *
     * @ORM\Column(name="groupe", type="string", length=255, nullable=false)
     */
    private $groupe;


    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;



    /**
     * Set groupe
     *
     * @param string $groupe
     * @return Admin
     */
   
    public function setGroupe($groupe)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get groupe
     *
     * @return string 
     */
    public function getGroupe()
    {
        return $this->groupe;
    }




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
     * @ORM\PrePersist
     */
    public function setCreatedAtValue(){
        $this->addRole('ROLE_ADMIN');
    }
}
