<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 17/02/2019
 * Time: 17:16
 */

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;

class ArticleSearch
{
    /**
     * @var string|null
     */
    private $titre;

    /**
     * @var ArrayCollection
     */
    private $tags;


    public function __construct()
    {
        $this->tags = new ArrayCollection();
    }

    /**
     * @return string|null
     */
    public function getTitre(): ?string
    {
        return $this->titre;
    }

    /**
     * @param string|null $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return ArrayCollection
     */
    public function getTags(): ArrayCollection
    {
        return $this->tags;
    }

    /**
     * @param ArrayCollection $tags
     */
    public function setTags(ArrayCollection $tags): void
    {
        $this->tags = $tags;
    }




}