<?php

declare(strict_types=1);

namespace App\Entity;

final class CategorieEntity
{
    private $ref; //Id de la catégorie

    private $nom; //Nom de la catégorie

    private $produits; //Liste des produits

    public function __construct()
    {
        $this->ref = \App\ORM\Util\UUID::v4();
    }

    public function getRef(): int
    {
        return $this->ref;
    }

    public function getNom(): string {
        return $this -> nom;
    }

    public function setNom(string $newNom): void
    {
        $this->nom = $newNom;
    }

    public function getProduits(): array {
        return $this -> produits;
    }

    public function addProduits(string $newProduit): void
    {
        array_push($this->produits,$newProduit);
    }


}
