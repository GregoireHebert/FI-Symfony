<?php

namespace App\Entity;

class Produit extends Element
{

    private $id;

    private $name;

    private $categoryProduits;

    public function __construct($quantite, $price, $name, $categoryProduits)
    {
        $this->id = \App\ORM\Util\UUID::v4();
        $this->$quantite = $quantite;
        $this->$price = $price;
        $this->$name = $name;
        $this->categoryProduits = $categoryProduits;
    }

    public function getId(): string
    {
        return $this->id;
    }

}
