<?php

declare(strict_types=1);

namespace App\Entity;


final class Product
{
    private $id;
    private $name;
    private $category;
    private $price;

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $category
     * @param $price
     */
    public function __construct()
    {
        $this->id = \App\ORM\Util\UUID::v4();
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }
}