<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Shop
 *
 * @ORM\Table(name="shop", uniqueConstraints={@ORM\UniqueConstraint(name="id_adress", columns={"id_adress"})})
 * @ORM\Entity
 */
class Shop
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=false)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=100, nullable=false)
     */
    //Default value
    private $logo="http://localhost/AdBoxi/MyAdBox/web/global/photos/cofee_shop.png";

    /**
     * @var \AdBoxBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="owner_id", referencedColumnName="id")
     * })
     */
    private $ownerId;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \AdBoxBundle\Entity\Adresse
     *
     * @ORM\ManyToOne(targetEntity="AdBoxBundle\Entity\Adresse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_adress", referencedColumnName="id")
     * })
     */
    private $idAdress;



    /**
     * Set name
     *
     * @param string $name
     * @return Shop
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set ownerId
     *
     * @param integer $ownerId
     * @return Shop
     */
    public function setOwnerId($ownerId)
    {
        $this->ownerId = $ownerId;

        return $this;
    }
    function getLogo() {
        return $this->logo;
    }

    function setLogo($logo) {
        $this->logo = $logo;
    }

        /**
     * Get ownerId
     *
     * @return integer 
     */
    public function getOwnerId()
    {
        return $this->ownerId;
    }

    /**
     * Set id
     *
     * @param \AdBoxBundle\Entity\ShopOwner $id
     * @return Shop
     */
    public function setId(\AdBoxBundle\Entity\ShopOwner $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AdBoxBundle\Entity\ShopOwner 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idAdress
     *
     * @param \AdBoxBundle\Entity\Adresse $idAdress
     * @return Shop
     */
    public function setIdAdress(\AdBoxBundle\Entity\Adresse $idAdress = null)
    {
        $this->idAdress = $idAdress;

        return $this;
    }

    /**
     * Get idAdress
     *
     * @return \AdBoxBundle\Entity\Adresse 
     */
    public function getIdAdress()
    {
        return $this->idAdress;
    }
}
