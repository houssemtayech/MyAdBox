<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Box
 *
 * @ORM\Table(name="box", uniqueConstraints={@ORM\UniqueConstraint(name="boxID", columns={"id"})})
 * @ORM\Entity
 */
class Box
{
    

     /**
     * @var string
     *
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     */
    private $id;



    
    public function setId( $id)
    {
        $this->id = $id;

        return $this;
    }

   
    public function getId()
    {
        return $this->id;
    }
}
