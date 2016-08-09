<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 */
class media
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Ad", mappedBy="media")
     */
    private $ad;

    /**
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="media")
     * @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     */
    private $client;
}