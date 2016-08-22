<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use PUGX\MultiUserBundle\Validator\Constraints\UniqueEntity;

/**
 * UserOne
 *
 * @ORM\Entity
 * @UniqueEntity(fields = "username", targetClass = "AdBoxBundle\Entity\User", message="fos_user.username.already_used")
 * @UniqueEntity(fields = "email", targetClass = "AdBoxBundle\Entity\User", message="fos_user.email.already_used")
 */
class UserOne extends User
{
 
}