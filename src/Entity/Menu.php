<?php

namespace App\Entity;

class Menu
{
    private $id;

    private $name;

    private $products;

    public function __construct(string $name, array $products = [])
    {
        $this->id = \App\ORM\Util\UUID::v4();
        $this->name = $name;
        $this->products = $products;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param array $products
     */
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }
}