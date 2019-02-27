<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Validator\Constraints as Assert;



/**
* BlogPost
* @ORM\Table(name="blog_post")
* @ORM\Entity(repositoryClass="App\Repository\BlogPostRepository")
* @ORM\HasLifecycleCallbacks
*/
class BlogPost
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="subtitle", type="string", length=255, unique=true)
     */
    private $subtitle;

    /**
     * @var string
     *
     * @ORM\Column(name="corpus", type="string", length=255)
     */
    private $corpus;

    /**
     * @var \DateTime
     *
     * @Assert\Type('\DateTime')
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return string
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return string
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
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
     * Set subtitle
     *
     * @param string $subtitle
     *
     * @return string
     */

    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }


    /**
     * @param mixed $corpus
     * @return blogPost
     */
    public function setCorpus($corpus)
    {
        $this->corpus = $corpus;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCorpus()
    {
        return $this->corpus;
    }


    /**
     * @param \DateTime $createdAt
     * @return blogPost
     */

    public function setCreatedAt(\DateTime $createdAt):self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return \DateTime
     */

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

}
