<?php

namespace App\Entity;

class Menu extends Element
{

    private $quantite;

    private $price;

    private $produits;

    private $categoryMenu;

    public function __construct($quantite, $price, $produits, $categoryMenu)
    {
        $this->quantite = $quantite;
        $this->price = $price;
        $this->produits = $produits;
        $this->categoryMenu = $categoryMenu;
    }

    public function getQuantite(): int
    {
        return $this->produits;
    }

    public function getPrice(): int
    {
        return $this->produits;
    }

    public function getProduits(): string
    {
        return $this->produits;
    }

    public function getCategoryMenu(): string
    {
        return $this->categoryMenu;
    }

}
