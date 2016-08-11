<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BidClient
 *
 * @ORM\Table(name="bid_client", indexes={@ORM\Index(name="id_bid", columns={"id_bid"}), @ORM\Index(name="id_user", columns={"id_client"})})
 * @ORM\Entity
 */
class BidClient
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
     * @var \AdBoxBundle\Entity\Client
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_client", referencedColumnName="id")
     * })
     */
    private $idClient;

    /**
     * @var \AdBoxBundle\Entity\Bid
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Bid")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bid", referencedColumnName="id")
     * })
     */
    private $idBid;


}
