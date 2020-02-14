<?php

namespace App\Entity;

class Menu implements MenuInterface
{

    use IdentifiableTrait;

    /**
     * The name of the menu
     *
     * @var string
     */
    private $name;

    /**
     * The list of product
     *
     * @var array
     */
    private $products;

    /**
     * The price of the menu
     *
     * @var float
     */
    private $price;

    public function __construct()
    {
        $this->id = \App\ORM\Util\UUID::v4();
    }

    /**
     * Get the name of the menu
     *
     * @return  string
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the name of the menu
     *
     * @param  string  $name  The name of the menu
     *
     */ 
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Get the list of product
     *
     * @return  array
     */ 
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set the list of product
     *
     * @param  array  $products  The list of product
     * 
     */ 
    public function setProducts(array $products)
    {
        $this->products = $products;
    }

    /**
     * Get the price of the menu
     *
     * @return  float
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the price of the menu
     *
     * @param  float  $price  The price of the menu
     *
     */ 
    public function setPrice(float $price)
    {
        $this->price = $price;
    }
}
