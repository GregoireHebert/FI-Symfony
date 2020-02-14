<?php

namespace App\Entity;

class Menu extends Element
{
    private $produits;

    private $categoryMenu;

    public function __construct($quantite, $price, $produits, $categoryMenu)
    {
        $this->quantite = $quantite;
        $this->price = $price;
        $this->produits = $produits;
        $this->categoryMenu = $categoryMenu;
    }

}
