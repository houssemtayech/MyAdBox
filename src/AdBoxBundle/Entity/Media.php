<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Media
 *
 * @ORM\Table(name="media")
 * @ORM\Entity
 */
class Media
{
    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="duree", type="integer", nullable=false)
     */
    private $duree;

    /**
     * @var string
     *
     * @ORM\Column(name="resolution", type="string", length=255, nullable=false)
     */
    private $resolution;

    /**
     * @var \AdBoxBundle\Entity\Client
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AdBoxBundle\Entity\Client")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;
      /**
     * @var string $path
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    private $path;
    
     /**
     * @var date $createdAt
     *
     * @ORM\Column(name="created_at", type="date")
     */
    private $createdAt;
   /**
     * @Assert\File(
     *     maxSize = "500M",
     *     mimeTypes = {"video/mpeg", "video/mp4", "video/quicktime", "video/x-ms-wmv", "video/x-msvideo", "video/x-flv"},
     *     mimeTypesMessage = "ce format de video est inconnu",
     *     uploadIniSizeErrorMessage = "uploaded file is larger than the upload_max_filesize PHP.ini setting",
     *     uploadFormSizeErrorMessage = "uploaded file is larger than allowed by the HTML file input field",
     *     uploadErrorMessage = "uploaded file could not be uploaded for some unknown reason",
     *     maxSizeMessage = "fichier trop volumineux"
     * )
     */
    public $file;


    /**
     * Set url
     *
     * @param string $url
     * @return Media
     */
      
    //les 4 fonctions suivantes sont pour le upload
    public function getAbsolutePath()
    {
        return null === $this->path ? null : $this->getUploadRootDir().'/'.$this->path;
    }
     
    public function getWebPath()
    {
        return null === $this->path ? null : $this->getUploadDir().'/'.$this->path;
    }
     
    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
     
    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return 'uploads/videos';
    }
     
    // **** les 3 fonctions suivantes servent à gérer le callback et l'upload de file
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload()
    {
        var_dump($this->file);
         
        if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->path = uniqid().'.'.$this->file->guessExtension();
        }
    }
     
    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload()
    {
        if (null === $this->file) {
            return;
        }
          
        // ** on peut mettre ça si on veut faire que le nom corresponde au nom de l'image original
        //$this->setName($this->file->getClientOriginalName());
     
        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->file->move($this->getUploadRootDir(), $this->path);
     
        unset($this->file);
    }
     
    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($file = $this->getAbsolutePath()) {
            unlink($file);
        }
    }
 
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Media
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     * @return Media
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set resolution
     *
     * @param string $resolution
     * @return Media
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * Get resolution
     *
     * @return string 
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Set id
     *
     * @param \AdBoxBundle\Entity\Client $id
     * @return Media
     */
    public function setId(\AdBoxBundle\Entity\Client $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \AdBoxBundle\Entity\Client 
     */
    public function getId()
    {
        return $this->id;
    }
}
