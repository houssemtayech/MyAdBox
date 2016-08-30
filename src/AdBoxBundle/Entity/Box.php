<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Box
 *
 * @ORM\Table(name="box", uniqueConstraints={@ORM\UniqueConstraint(name="boxID", columns={"boxID"})})
 * @ORM\Entity
 */
class Box
{
    /**
     * @var string
     *
     * @ORM\Column(name="boxID", type="string", length=100, nullable=false)
     */
    private $boxid;

     /**
     * @var integer
     *
     * @ORM\Column(name="id_Box", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;



    /**
     * Set boxid
     *
     * @param string $boxid
     * @return Box
     */
    public function setBoxid($boxid)
    {
        $this->boxid = $boxid;

        return $this;
    }

    /**
     * Get boxid
     *
     * @return string 
     */
    public function getBoxid()
    {
        return $this->boxid;
    }

    /**
     * Set id
     *
     * @param \AdBoxBundle\Entity\Shop $id
     * @return Box
     */
    public function setId(\AdBoxBundle\Entity\Shop $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AdBoxBundle\Entity\Shop 
     */
    public function getId()
    {
        return $this->id;
    }
}
