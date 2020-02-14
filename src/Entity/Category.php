<?php

namespace App\Entity;

class Category implements CategoryInterface
{
    use IdentifiableTrait;

    /**
     * The name of the category.
     *
     * @var string
     */
    private $name;

    public function __construct()
    {
        $this->id = \App\ORM\Util\UUID::v4();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }
}