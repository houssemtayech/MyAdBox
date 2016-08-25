<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShopOwner
 *
 * @ORM\Table(name="shop_owner")
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Entity
 */
class ShopOwner extends User
{
    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255, nullable=false)
     */
    private $categorie;

    /**
     * @var float
     *
     * @ORM\Column(name="solde", type="float", precision=10, scale=0, nullable=false)
     */
    private $solde;

    /**
     * @var \AdBoxBundle\Entity\Adresse
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\OneToOne(targetEntity="AdBoxBundle\Entity\Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    protected $id;



    /**
     * Set categorie
     *
     * @param string $categorie
     * @return ShopOwner
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set solde
     *
     * @param float $solde
     * @return ShopOwner
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
     * Set id
     *
     * @param \AdBoxBundle\Entity\Adresse $id
     * @return ShopOwner
     */
    public function setId(\AdBoxBundle\Entity\Adresse $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AdBoxBundle\Entity\Adresse 
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue(){
        $this->addRole('ROLE_SHOPOWNER');
    }
}