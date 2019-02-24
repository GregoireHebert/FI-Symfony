<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use App\Entity\Tag;

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
    public $id;
    /**
     * @ORM\Column(type="string", length= 255)
     * @Assert\Length(min="5")
     */
    public $title;
    /**
     * @ORM\Column(type="string", length= 255)
     * @Assert\Length(min="5")
     */
    public $subtitle;
    /**
     * @ORM\Column(type="string", length= 500)
     * @Assert\Length(min="5")
     */
    public $corpus;
    /**
     * @ORM\Column(type="date")
     */
    public $createdAt;
    /**
     * @ORM\Column(type="array")
     * One article has many tags. This is the inverse side.
     */
    public $tags;

    
    
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

}