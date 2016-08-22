<?php

namespace AdBoxBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 * @ORM\InheritanceType("SINGLE_TABLE")
 *
 */
Abstract class User extends BaseUser
{
 /**
 * @ORM\Id
 * @ORM\Column(type="integer")
 * @ORM\GeneratedValue(strategy="AUTO")
 */
 protected $id;
 public function __construct()
 {
 parent::__construct();
 // your own logic
 }
}
