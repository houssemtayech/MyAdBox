<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;



/**
 * Client
 * 
 * @ORM\Table(name="client", indexes={@ORM\Index(name="id_adress", columns={"id_adress"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()

 */
class Client extends User
{
    
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        $this->addRole('ROLE_CLIENT');
    }
    /**
     * @var float
     *
     * @ORM\Column(name="solde", type="float", precision=10, scale=0, nullable=false)
     */
    private $solde;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \AdBoxBundle\Entity\Adresse
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_adress", referencedColumnName="id")
     * })
     */
    private $idAdress;



    /**
     * Set solde
     *
     * @param float $solde
     * @return Client
     */
    public function setSolde($solde)
    {
        $this->solde = $solde;

        return $this;
    }

    /**
     * Get solde
     *
     * @return float 
     */
    public function getSolde()
    {
        return $this->solde;
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
     * Set idAdress
     *
     * @param \AdBoxBundle\Entity\Adresse $idAdress
     * @return Client
     */
    public function setIdAdress(\AdBoxBundle\Entity\Adresse $idAdress = null)
    {
        $this->idAdress = $idAdress;

        return $this;
    }

    /**
     * Get idAdress
     *
     * @return \AdBoxBundle\Entity\Adresse 
     */
    public function getIdAdress()
    {
        return $this->idAdress;
    }
}
