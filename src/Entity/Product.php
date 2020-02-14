<?php

namespace App\Entity;

class Product implements ProductInterface
{
    /**
     * The name of the product
     *
     * @var string
     */
    private $name;

    /**
     * The category of the product
     *
     * @var CategoryInterface
     */
    private $category;

    /**
     * The price of the product
     *
     * @var float
     */
    private $price;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getCategory(): CategoryInterface
    {
        return $this->category;
    }

    public function setCategory(CategoryInterface $category)
    {
        $this->category = $category;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(float $price)
    {
        $this->price = $price;
    }
}
