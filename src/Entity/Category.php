<?php

namespace App\Entity;

class Category implements CategoryInterface
{
    /**
     * The name of the category.
     *
     * @var string
     */
    private $name;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}