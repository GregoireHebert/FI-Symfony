<?php

namespace  Afrass\TagBundle\Concern;

trait Taggable{


    /**
     * @var array
     *
     * @ORM\ManyToMany(targetEntity="Afrass\TagBundle\Entity\Tag", cascade={"persist"})
     *
     *
     */
    private $tags;

    /**
     * Add tag
     *
     * @param \Afrass\TagBundle\Entity\Tag $tag
     *
     * @return Post
     */
    public function addTag(\Afrass\TagBundle\Entity\Tag $tag)
    {
        $this->tags[] = $tag;

        return $this;
    }

    /**
     * Remove tag
     *
     * @param \Afrass\TagBundle\Entity\Tag $tag
     */
    public function removeTag(\Afrass\TagBundle\Entity\Tag $tag)
    {
        $this->tags->removeElement($tag);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }
}