<?php

namespace App\Entity;

class Product implements ProductInterface
{
    use IdentifiableTrait;

    /**
     * The name of the product
     *
     * @var string
     */
    public $name;

    /**
     * The category of the product
     *
     * @var CategoryInterface
     */
    public $category;

    /**
     * The price of the product
     *
     * @var float
     */
    public $price;

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
