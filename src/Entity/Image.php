<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ImageRepository")
 */
class Image
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    
    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Trick", inversedBy="images", cascade={"persist", "remove"})
    */
    private $trick;

    private $file;
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
    public function getTrick()
    {
            return $this->trick;
    }

    public function setTrick($trick)
    {
            $this->trick = $trick;
            return $this;
    }
    
    function getFile() {
        return $this->file;
    }

    function setFile($file) {
        $this->file = $file;
        return $this;
    }
    
}
