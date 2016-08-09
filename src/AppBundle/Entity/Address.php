<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Address
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(nullable=true)
     */
    private $latitude;

    /**
     * @ORM\Column(nullable=true)
     */
    private $longitude;

    /**
     * @ORM\Column(nullable=true)
     */
    private $country;

    /**
     * @ORM\Column(nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(nullable=true)
     */
    private $postal_code;

    /**
     * @ORM\Column(nullable=true)
     */
    private $region;

    /**
     * @ORM\Column(nullable=true)
     */
    private $street;

    /**
     * @ORM\OneToMany(targetEntity="Shop", mappedBy="address")
     */
    private $shop;

    /**
     * @ORM\OneToMany(targetEntity="Shop_owner", mappedBy="address")
     */
    private $shopOwner;

    /**
     * @ORM\OneToMany(targetEntity="Client", mappedBy="address")
     */
    private $client;
}