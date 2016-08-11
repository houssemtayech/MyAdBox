<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity
 */
class Admin
{
    /**
     * @var string
     *
     * @ORM\Column(name="groupe", type="string", length=255, nullable=false)
     */
    private $groupe;

    /**
     * @var integer
     *
     * @ORM\Column(name="CIN", type="integer", nullable=false)
     */
    private $cin;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;


}
