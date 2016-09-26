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
     * @var \AdBoxBundle\Entity\Bid
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Bid")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_bid", referencedColumnName="id")
     * })
     */
    private $idBid;

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
     * @var float
     *
     * @ORM\Column(name="price", type="float", precision=10, scale=0, nullable=false)
     */
    private $price;
 /**
     * @var \DateTime
     *
     * @ORM\Column(name="timestamp", type="datetime", nullable=false)
     */
    private $timestamp ;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idBid
     *
     * @param \AdBoxBundle\Entity\Bid $idBid
     * @return BidClient
     */
    public function setIdBid(\AdBoxBundle\Entity\Bid $idBid = null)
    {
        $this->idBid = $idBid;

        return $this;
    }

    /**
     * Get idBid
     *
     * @return \AdBoxBundle\Entity\Bid
     */
    public function getIdBid()
    {
        return $this->idBid;
    }

    /**
     * Set idClient
     *
     * @param \AdBoxBundle\Entity\Client $idClient
     * @return BidClient
     */
    public function setIdClient(\AdBoxBundle\Entity\Client $idClient = null)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get idClient
     *
     * @return \AdBoxBundle\Entity\Client
     */
    public function getIdClient()
    {
        return $this->idClient;
    }

    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }


    public function getPrice()
    {
        return $this->price;
    }
    public function getTimestamp() {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTime $timestamp) {
        $this->timestamp = $timestamp;
    }


}
