<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class Action_shop extends Action
{
    /**
     * @ORM\ManyToOne(targetEntity="Shop", inversedBy="actionShop")
     * @ORM\JoinColumn(name="shop_id", referencedColumnName="id")
     */
    private $shop;
}