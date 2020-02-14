<?php

namespace App\Entity;

interface ProductInterface
{
    public function getName(): string;

    public function setName(string $name);

    public function getCategory(): CategoryInterface;

    public function setCategory(CategoryInterface $category);

    public function getPrice(): float;

    public function setPrice(float $price);
}
