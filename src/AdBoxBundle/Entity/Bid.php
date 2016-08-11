<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bid
 *
 * @ORM\Table(name="bid")
 * @ORM\Entity
 */
class Bid
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="start_time", type="time", nullable=false)
     */
    private $startTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="end_time", type="time", nullable=false)
     */
    private $endTime;

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


}
