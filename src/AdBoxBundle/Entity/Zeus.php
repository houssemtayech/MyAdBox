<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Zeus
 *
 * @ORM\Table(name="zeus")
 * @ORM\Entity
 */
class Zeus
{
    /**
     * @var \AdBoxBundle\Entity\Admin
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AdBoxBundle\Entity\Admin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;



    /**
     * Set id
     *
     * @param \AdBoxBundle\Entity\Admin $id
     * @return Zeus
     */
    public function setId(\AdBoxBundle\Entity\Admin $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AdBoxBundle\Entity\Admin 
     */
    public function getId()
    {
        return $this->id;
    }
}
