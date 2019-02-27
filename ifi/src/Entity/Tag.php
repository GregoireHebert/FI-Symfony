<?php
/**
 * Created by IntelliJ IDEA.
 * User: redan
 * Date: 26/02/2019
 * Time: 19:42
 */

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
     * @ORM\Column(type="string", length= 255)
     */
    public $article;

    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getArticle(): ?string
    {
        return $this->article;
    }
    public function setArticle(string $art): void
    {
        $this->article = $art;
    }
}