<?php

namespace App\Entity;

final class Commande
{
    private $numCommande;

    private $elements;

    private $user;

    private $status;

    public function __construct($numCommande, $elements, $user, $status)
    {
        $this->numCommande = $numCommande;
        $this->$elements = $elements;
        $this->user = $user;
        $this->$status = $status;
    }

}
