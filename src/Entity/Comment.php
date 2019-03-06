<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use DateTime;
/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $create_at;
    
    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Trick", inversedBy="comments", cascade={"persist", "remove"})
    */
    private $trick;
    
    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\User")
    */
    private $user;
    
    public function __construct() {  
        $this->create_at=new DateTime('now');
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeInterface
    {
        return $this->create_at;
    }

    public function setCreateAt(\DateTimeInterface $create_at): self
    {
        $this->create_at = $create_at;

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
    function getUser() : ?UserInterface{ 
        return $this->user;
    }

    function setUser(UserInterface $user):self {
        $this->user = $user;
        return $this;
    }
}
