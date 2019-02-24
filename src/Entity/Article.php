<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\ORM\Mapping\JoinColumn;
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
     * One article has many tags. This is the inverse side.
     * @OneToMany(targetEntity="Tag", mappedBy="article")
     */
    public $tags;
}