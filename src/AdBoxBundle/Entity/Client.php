<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client", indexes={@ORM\Index(name="id_adress", columns={"id_adress"})})
 * @ORM\Entity
 */
class Client
{
    /**
     * @var float
     *
     * @ORM\Column(name="solde", type="float", precision=10, scale=0, nullable=false)
     */
    private $solde;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
