<?php

declare(strict_types=1);

namespace App\Entity;

final class Product
{
    private $id;
    private $name;
    private $price;
    private $category;

    public function __construct(string $name, float $price, Category $category)
    {
        $this->id = \App\ORM\Util\UUID::v4();
        $this->name = $name;
        $this->price = $price;
        $this->category = $category;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }
}
