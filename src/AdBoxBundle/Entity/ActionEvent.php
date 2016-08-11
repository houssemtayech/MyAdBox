<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionEvent
 *
 * @ORM\Table(name="action_event")
 * @ORM\Entity
 */
class ActionEvent
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_event", type="integer", nullable=false)
     */
    private $idEvent;

    /**
     * @var \AdBoxBundle\Entity\Action
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AdBoxBundle\Entity\Action")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}
