<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Tag
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
    public $name;
    /**
     * Many tags have one tag. This is the owning side.
     * @ManyToOne(targetEntity="Article", inversedBy="tags")
     * @JoinColumn(name="article_id", referencedColumnName="id")
     */
    public $article;
}