<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VideoRepository")
 */
class Video
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
    private $urlIFrame;
    
    /**
    * @ORM\ManyToOne(targetEntity="Trick", inversedBy="videos", cascade={"persist", "remove"})
    */
    private $trick;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUrlIFrame(): ?string
    {
        return $this->urlIFrame;
    }

    public function setUrlIFrame(string $urlIFrame): self
    {
        $this->urlIFrame = $urlIFrame;

        return $this;
    }
}
