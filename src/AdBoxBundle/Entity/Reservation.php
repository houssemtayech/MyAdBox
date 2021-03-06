<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation", indexes={@ORM\Index(name="id_client", columns={"id_client"})})
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var \AdBoxBundle\Entity\Timelaps
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AdBoxBundle\Entity\Timelaps")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
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
     * Set id
     *
     * @param \AdBoxBundle\Entity\Timelaps $id
     * @return Reservation
     */
    public function setId(\AdBoxBundle\Entity\Timelaps $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AdBoxBundle\Entity\Timelaps 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idClient
     *
     * @param \AdBoxBundle\Entity\Client $idClient
     * @return Reservation
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
}
