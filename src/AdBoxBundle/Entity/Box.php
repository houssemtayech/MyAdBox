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
     * @var \AdBoxBundle\Entity\Shop
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AdBoxBundle\Entity\Shop")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}
