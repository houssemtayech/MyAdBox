<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Client 
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Media", mappedBy="client")
     */
    private $media;

    /**
     * @ORM\OneToMany(targetEntity="Notification", mappedBy="client")
     */
    private $notification;

    /**
     * @ORM\ManyToOne(targetEntity="Address", inversedBy="client")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;
}