<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Shop
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Ad", mappedBy="shop")
     */
    private $ad;

    /**
     * @ORM\OneToMany(targetEntity="Action_shop", mappedBy="shop")
     */
    private $actionShop;

    /**
     * @ORM\OneToMany(targetEntity="Box", mappedBy="shop")
     */
    private $box;

    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="shop")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity="Shop_owner", inversedBy="shop")
     * @ORM\JoinColumn(name="shop_owner_id", referencedColumnName="id")
     */
    private $shopOwner;
}