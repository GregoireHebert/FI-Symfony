<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @ORM\ManyToMany(targetEntity="Article",inversedBy="articles")
     */
    public $tag;

    /**
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tag;
    }
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
}