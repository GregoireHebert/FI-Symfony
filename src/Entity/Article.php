<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Article
{
    public function __construct()
    {
        $this->tag = new ArrayCollection();
        $this->title = "undefined";
        $this->subtitle = "undefined";
        $this->corpus = "undefined";
    }

    public function __toString(): string
    {
        return $this->title;
    }

    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="2")
     */
    public $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="2")
     */
    public $subtitle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    public $corpus;

    /**
     * @ORM\Column(type="datetime")
     */
    public $createdAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", inversedBy="articles")
     */
    public $tag;

    public function addTag(Tag $tag): self
    {
        if (!$this->tag->contains($tag)) {
            $this->tag[] = $tag;
            $tag->addArticle($this);
        }
        return $this;
    }

    public function removeTag(Tag $tag): self
    {
        if ($this->tag->contains($tag)) {
            $this->tag->removeElement($tag);
            $tag->removeArticle($this);
        }
        return $this;
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

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): self
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    public function getCorpus(): ?string
    {
        return $this->corpus;
    }

    public function setCorpus(string $corpus): self
    {
        $this->corpus = $corpus;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTag(): Collection
    {
        return $this->tag;
    }
}