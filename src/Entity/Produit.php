<?php

namespace App\Entity;

final class Produit extends Element
{
    private $name;

    private $categoryProduits;

    public function __construct($quantite, $price, $name, $categoryProduits)
    {
        $this->$quantite = $quantite;
        $this->$price = $price;
        $this->$name = $name;
        $this->categoryProduits = $categoryProduits;
    }

}
