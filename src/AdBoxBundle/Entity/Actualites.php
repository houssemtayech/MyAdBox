<?php

namespace AdBoxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Actualites
 *
 * @ORM\Table(name="actualites")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Actualites {

    /**
     * @var integer
     *
     * @ORM\Column(name="idActualite", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idactualite;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="corps", type="text", nullable=false)
     */
    private $corps;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateRedaction", type="date", nullable=false)
     */
    private $dateredaction;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255, nullable=false)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="photo", type="string", length=255, nullable=true)
     */
    public $photo;
    public $oldFile;
    public $tempFile;

    /**
     * @Assert\File(maxSize="6000000")
     */
   private $file;
    

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }
    public function getAbsolutePath()
    {
        return null === $this->photo
            ? null
            : $this->getUploadRootDir().'/'.$this->photo;
    }

    public function getWebPath()
    {
        return null === $this->photo
            ? null
            : $this->getUploadDir().'/'.$this->photo;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/';
    }
    public function upload()
    {
    // the file property can be empty if the field is not required
    if (null === $this->getFile()) {
        return;
    }

    // use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the
    // target filename to move to
    $this->getFile()->move(
        $this->getUploadRootDir(),
        $this->getFile()->getClientOriginalName()
    );

    // set the path property to the filename where you've saved the file
    $this->photo = $this->getFile()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
    $this->file = null;
    }
    function getIdactualite() {
        return $this->idactualite;
    }

    function getTitre() {
        return $this->titre;
    }

    function getCorps() {
        return $this->corps;
    }

    function getDateredaction() {
        return $this->dateredaction;
    }

    function getEtat() {
        return $this->etat;
    }

    function setIdactualite($idactualite) {
        $this->idactualite = $idactualite;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setCorps($corps) {
        $this->corps = $corps;
    }

    function setDateredaction(\DateTime $dateredaction) {
        $this->dateredaction = $dateredaction;
    }

    function setEtat($etat) {
        $this->etat = $etat;
    }

    function getPhoto() {
        return $this->photo;
    }

    function setPhoto($photo) {
        $this->photo = $photo;
    }

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
    }

    
}