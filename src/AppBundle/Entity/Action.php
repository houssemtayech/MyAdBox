<?php
namespace AppBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 */
class Action
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $timestamp;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $action_type;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $message;

    /**
     * @ORM\ManyToOne(targetEntity="Admin", inversedBy="actions")
     * @ORM\JoinColumn(name="admin_id", referencedColumnName="id")
     */
    private $admin;
}