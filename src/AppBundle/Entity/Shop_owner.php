<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Shop_owner 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Shop", mappedBy="shopOwner")
     */
    private $shop;

    /**
     * @ORM\OneToMany(targetEntity="Notification", mappedBy="shopOwner")
     */
    private $notification;

    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="shopOwner")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;
}