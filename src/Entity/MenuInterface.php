<?php

namespace App\Entity;

interface MenuInterface extends IdentifiableTraitInterface
{

    public function getName(): string;

    public function setName(string $name);

    public function getProducts(): array;

    public function setProducts(array $products);

    public function getPrice(): float;

    public function setPrice(float $price);
}
