<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionTimelaps
 *
 * @ORM\Table(name="action_timelaps")
 * @ORM\Entity
 */
class ActionTimelaps
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_timelaps", type="integer", nullable=false)
     */
    private $idTimelaps;

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
