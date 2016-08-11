<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Timelaps
 *
 * @ORM\Table(name="timelaps", indexes={@ORM\Index(name="id_pointpub", columns={"id_pointpub"})})
 * @ORM\Entity
 */
class Timelaps
{
    /**
     * @var integer
     *
     * @ORM\Column(name="priorite", type="integer", nullable=false)
     */
    private $priorite;

    /**
     * @var boolean
     *
     * @ORM\Column(name="etat", type="boolean", nullable=false)
     */
    private $etat;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_start", type="datetime", nullable=false)
     */
    private $dateStart;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_end", type="datetime", nullable=false)
     */
    private $dateEnd;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AdBoxBundle\Entity\Shop
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Shop")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pointpub", referencedColumnName="id")
     * })
     */
    private $idPointpub;


}
