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



    /**
     * Set idTimelaps
     *
     * @param integer $idTimelaps
     * @return ActionTimelaps
     */
    public function setIdTimelaps($idTimelaps)
    {
        $this->idTimelaps = $idTimelaps;

        return $this;
    }

    /**
     * Get idTimelaps
     *
     * @return integer 
     */
    public function getIdTimelaps()
    {
        return $this->idTimelaps;
    }

    /**
     * Set id
     *
     * @param \AdBoxBundle\Entity\Action $id
     * @return ActionTimelaps
     */
    public function setId(\AdBoxBundle\Entity\Action $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AdBoxBundle\Entity\Action 
     */
    public function getId()
    {
        return $this->id;
    }
}
