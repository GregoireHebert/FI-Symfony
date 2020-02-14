<?php

namespace App\Entity;

class Element
{
    private $quantite;

    private $price;

    public function __construct($price, $quantite)
    {
        $this->$quantite = $quantite;
        $this->$price = $price;
    }

}
