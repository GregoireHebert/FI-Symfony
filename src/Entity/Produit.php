<?php

declare(strict_types=1);

namespace App\Entity;

final class Produit
{
    private $ref;

    private $prix;

    private $nom;

    public function __construct()
    {
        $this->ref = \App\ORM\Util\UUID::v4();
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPrix(): double
    {
        return $this->prix;
    }
    public function setPrix(double $prix): void
    {
        $this->prix = $prix;
    }

    public function getNom(): string
    {
        return $this->nom;
    }
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }
}
