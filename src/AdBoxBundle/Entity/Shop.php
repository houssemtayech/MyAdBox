<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Shop
 *
 * @ORM\Table(name="shop", indexes={@ORM\Index(name="fk_Shop_ShopOwner1_idx", columns={"ShopOwner_id_ShopOwner"})})
 * @ORM\Entity
 * 
 */

class Shop
{
    
     
    /**
     * @var integer
     *
     * @ORM\Column(name="id_Shop", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;
   
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

   

    /**
     * @var \AdBoxBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ShopOwner_id_ShopOwner", referencedColumnName="id")
     * })
     */
    private $shopOwner;

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    function getShopOwner() {
        return $this->shopOwner;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setShopOwner(\AdBoxBundle\Entity\User $shopOwner) {
        $this->shopOwner = $shopOwner;
    }


}
