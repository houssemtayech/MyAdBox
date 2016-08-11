<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pub
 *
 * @ORM\Table(name="pub", indexes={@ORM\Index(name="id_intervalle", columns={"id_timelaps"}), @ORM\Index(name="id_media", columns={"id_media"}), @ORM\Index(name="id_shop", columns={"id_shop"}), @ORM\Index(name="id_timelaps", columns={"id_timelaps"}), @ORM\Index(name="id_media_2", columns={"id_media"})})
 * @ORM\Entity
 */
class Pub
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AdBoxBundle\Entity\Timelaps
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Timelaps")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_timelaps", referencedColumnName="id")
     * })
     */
    private $idTimelaps;

    /**
     * @var \AdBoxBundle\Entity\Shop
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Shop")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_shop", referencedColumnName="id")
     * })
     */
    private $idShop;

    /**
     * @var \AdBoxBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_media", referencedColumnName="id")
     * })
     */
    private $idMedia;


}
