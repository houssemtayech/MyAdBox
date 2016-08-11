<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ShopOwner
 *
 * @ORM\Table(name="shop_owner")
 * @ORM\Entity
 */
class ShopOwner
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
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AdBoxBundle\Entity\Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}
