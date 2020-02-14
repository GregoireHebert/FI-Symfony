<?php

declare(strict_types=1);

namespace App\Entity;

final class Commande
{
    private $id;
    private $listMenu;
    private $listProduit;
    private $prix;

    public function __construct()
    {
        $this->id = \App\ORM\Util\UUID::v4();
    }
    public function getId(): string
    {
        return $this->id;
    }
    public function getListProduit(): array
    {
        return $this->listProduit;
    }
    public function getListMenu(): array
    {
        return $this->listMenu;
    }
    public function getPrix(): int
    {
        return $this->prix;
    }

    public function setListProduit($produits): void
    {
         $this->listProduit = $produits;
    }
    public function setListMenu($menus): void
    {
         $this->listMenu = $menus;
    }
    public function setPrix(int $prix): void
    {
         $this->prix = $prix;
    }



}
