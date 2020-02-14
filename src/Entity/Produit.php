<?php

namespace App\Entity;

class Produit
{

    private $id;

    private $name;

    private $categoryProduits;

    private $quantite;

    private $price;

    public function __construct($quantite, $price, $name, $categoryProduits)
    {
        $this->id = \App\ORM\Util\UUID::v4();
        $this->quantite = $quantite;
        $this->price = $price;
        $this->name = $name;
        $this->categoryProduits = $categoryProduits;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCategoryProduits(): string
    {
        return $this->categoryProduits;
    }

    public function getQuantite(): string
    {
        return $this->quantite;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

}
