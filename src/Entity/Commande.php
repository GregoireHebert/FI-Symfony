<?php

namespace App\Entity;

class Commande
{
    private $id;

    private $numCommande;

    private $elements;

    private $user;

    private $status;

    public function __construct($numCommande, $elements, $user, $status)
    {
        $this->id = \App\ORM\Util\UUID::v4();
        $this->numCommande = $numCommande;
        $this->elements = $elements;
        $this->user = $user;
        $this->status = $status;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getUser(): User
    {
        return $this->user;
    }

    public function getNumCommande(): string
    {
        return $this->numCommande;
    }

    public function getElements(): Element
    {
        return $this->elements;
    }

    public function getStatus(): Statut
    {
        return $this->status;
    }

}
