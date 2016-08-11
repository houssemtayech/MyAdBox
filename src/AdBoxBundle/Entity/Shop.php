<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shop
 *
 * @ORM\Table(name="shop", uniqueConstraints={@ORM\UniqueConstraint(name="id_adress", columns={"id_adress"})})
 * @ORM\Entity
 */
class Shop
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="owner_id", type="integer", nullable=false)
     */
    private $ownerId;

    /**
     * @var \AdBoxBundle\Entity\ShopOwner
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AdBoxBundle\Entity\ShopOwner")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \AdBoxBundle\Entity\Adresse
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_adress", referencedColumnName="id")
     * })
     */
    private $idAdress;


}
