<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Ad
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Media", inversedBy="ad")
     * @ORM\JoinColumn(name="media_id", referencedColumnName="id", unique=true)
     */
    private $media;

    /**
     * @ORM\OneToOne(targetEntity="Shop", inversedBy="ad")
     * @ORM\JoinColumn(name="shop_id", referencedColumnName="id", unique=true)
     */
    private $shop;

    /**
     * @ORM\ManyToOne(targetEntity="Timelaps", inversedBy="ad")
     * @ORM\JoinColumn(name="timelaps_id", referencedColumnName="id")
     */
    private $timelaps;
}