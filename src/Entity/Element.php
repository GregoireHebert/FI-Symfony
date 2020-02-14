<?php

namespace App\Entity;

final class Element
{
    private $quantite;

    private $price;

    public function __construct($price, $quantite)
    {
        $this->$quantite = $quantite;
        $this->$price = $price;
    }

}
