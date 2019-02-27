<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private  $id;
    /**
     * @ORM\Column(type="string", length= 255)
     * @Assert\Length(min="5")
     */
    private  $title;
    /**
     * @ORM\Column(type="string", length= 255)
     * @Assert\Length(min="5")
     */
    private  $subtitle;
    /**
     * @ORM\Column(type="string", length= 500)
     * @Assert\Length(min="5")
     */
    private  $corpus;

    /**
     * @ORM\Column(type="datetime")
     */
    private  $createdAt;
    /**
     * @ORM\Column(type="array")
     * One article has many tags. This is the inverse side.
     */
    private  $tags;


    public function __construct() {
        $this->tags = new ArrayCollection();
    }
    public function getCorpus(): ?string
    {
        return $this->corpus;
    }
    public function setCorpus(string $corpus): void
    {
        $this->corpus = $corpus;
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function setSubtitle(string $subtitle): void
    {
        $this->subtitle = $subtitle;
    }
    public function getId(): ?string
    {
        return $this->id;
    }
    public function getTags()
    {
        return $this->tags;
    }
    public function getTitle(): ?string
    {
        return $this->title;
    }
    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }
    public function addTag(Tag $tag): void
    {
        array_push($this->tags,$tag);
    }
    public function setTag(array $tag): void
    {
        $this->tags = $tag;
    }
    public function setCreatedAt(\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }


    /**
     * @ORM\PrePersist()
     */
    public function prePersist()
    {
        $this->createdAt =new \DateTime();

    }
}