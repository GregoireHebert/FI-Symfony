<?php

declare(strict_types=1);

namespace App\Entity;

final class Commande
{
    private $ref;

    private $menus;

    private $produits;

    public function __construct()
    {
        $this->ref = \App\ORM\Util\UUID::v4();
    }

    public function getId(): int
    {
        return $this->ref;
    }

    public function getMenus(): array {
        return $this -> menus;
    }
    public function setMenus(array $menus): void
    {
        $this->menus = $menus;
    }
    public function addMenu(Menu $menu): void
    {
        array_push($this->menus,$menu);
    }

    public function getProduits(): array {
        return $this -> produits;
    }
    public function setProduits(array $produits): void
    {
        $this->produits = $produits;
    }
    public function addProduit(Produit $produit): void
    {
        array_push($this->produits,$produit);
    }
}
