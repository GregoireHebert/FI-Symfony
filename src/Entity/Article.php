<?php
declare(strict_types=1);

namespace App\Entity;

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
}