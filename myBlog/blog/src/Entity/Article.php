<?php /** @noinspection PhpUnusedAliasInspection */

/** @noinspection PhpUndefinedClassInspection */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;



/**
 * @ORM\Table(name="Article")
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     * @ORM\Column(name="subtitle", type="string", length=255, nullable=true)
     */
    private $subtitle;

    /**
     * @var string
     * @ORM\Column(name="corpus", type="string", length=255)
     */
    private $corpus;

    /**
     * @var \DateTime
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var Collection|Tag[]
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", mappedBy="articles")
     */
    private $tags;

    public function __construct() {
        $this->tags = new ArrayCollection();
    }

    /**
     * @return Collection|Tag[]
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set tag
     *
     * @param Tag $tag
     *
     * @return void
     */
    public function setTag($tag)
    {
        $this->tags = $tag;
    }
    /**
     * @param Tag $tag
     * @return void
     */
    public function addTag($tag)
    {
        array_push($this->tags,$tag);
    }

    /**
     * @param Tag $tag
     * @return void
     */
    public function addTag2($tag)
    {
            if (!$this->tags->contains($tag)) {
                $this->tags[] = $tag;
            }
    }

    /**
     * @param Tag $tag
     * @return Article
     */
    public function removeTag(Tag $tag)
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
            $tag->removeArticle($this);
        }
        return $this;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set subtitle
     *
     * @param string $subtitle
     *
     * @return Article
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get corpus
     *
     * @return string
     */
    public function getCorpus()
    {
        return $this->corpus;
    }

    /**
     * Set corpus
     *
     * @param string $corpus
     *
     * @return Article
     */
    public function setCorpus($corpus)
    {
        $this->corpus = $corpus;

        return $this;
    }

    /**
     * Get CreatedAt
     *
     * @return \DateTimeInterface
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdAt
     *
     * @param \DateTimeInterface
     *
     * @return Article
     */
    public function setCreatedAt(\DateTimeInterface $createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
