<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pub
 *
 * @ORM\Table(name="pub", indexes={@ORM\Index(name="id_intervalle", columns={"id_timelaps"}), @ORM\Index(name="id_media", columns={"id_media"}), @ORM\Index(name="id_user", columns={"id_user"}), @ORM\Index(name="id_timelaps", columns={"id_timelaps"})})
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
     * @var \AdBoxBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUSer;

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
     * @var \AdBoxBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Media")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_media", referencedColumnName="id")
     * })
     */
    private $idMedia;
 /**
     * @var boolean
     *
     * @ORM\Column(name="isEnabled", type="boolean", nullable=false)
     */
    private $isEnabled;

/**
     * Set isEnabled
     *
     * @param boolean $isEnabled
     * @return Pub
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * Get isEnabled
     *
     * @return boolean 
     */
    public function getisEnabled()
    {
        return $this->isEnabled;
    }
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
     * Set idUSer
     *
     * @param \AdBoxBundle\Entity\User $idUSer
     * @return Pub
     */
    public function setidUSer(\AdBoxBundle\Entity\User $idUSer = null)
    {
        $this->idUSer = $idUSer;

        return $this;
    }

    /**
     * Get idUSer
     *
     * @return \AdBoxBundle\Entity\User
     */
    public function getidUSer()
    {
        return $this->idUSer;
    }

    /**
     * Set idTimelaps
     *
     * @param \AdBoxBundle\Entity\Timelaps $idTimelaps
     * @return Pub
     */
    public function setIdTimelaps(\AdBoxBundle\Entity\Timelaps $idTimelaps = null)
    {
        $this->idTimelaps = $idTimelaps;

        return $this;
    }

    /**
     * Get idTimelaps
     *
     * @return \AdBoxBundle\Entity\Timelaps
     */
    public function getIdTimelaps()
    {
        return $this->idTimelaps;
    }

    /**
     * Set idMedia
     *
     * @param \AdBoxBundle\Entity\Media $idMedia
     * @return Pub
     */
    public function setIdMedia(\AdBoxBundle\Entity\Media $idMedia = null)
    {
        $this->idMedia = $idMedia;

        return $this;
    }

    /**
     * Get idMedia
     *
     * @return \AdBoxBundle\Entity\Media
     */
    public function getIdMedia()
    {
        return $this->idMedia;
    }
}
