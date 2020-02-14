<?php

declare(strict_types=1);

namespace App\Entity;

final class Menu
{
    private $ref;

    private $prix;

    private $boisson;

    private $plat;

    private $accompagnement;

    public function __construct()
    {
        $this->ref = \App\ORM\Util\UUID::v4();
    }

    public function getId(): string
    {
        return $this->ref;
    }

    public function getPrix(): string
    {
        return $this->prix;
    }
    public function setPrix(string $prix): void
    {
        $this->prix = $prix;
    }

    public function getBoisson(): CategorieEntity
    {
        return $this->boisson;
    }
    public function setBoisson(CategorieEntity $boisson): void
    {
        $this->boisson = $boisson;
    }

    public function getPlat(): CategorieEntity
    {
        return $this->plat;
    }
    public function setPlat(CategorieEntity $accompagnement): void
    {
        $this->plat = $plat;
    }

    public function getAccompagnement(): CategorieEntity
    {
        return $this->accompagnement;
    }
    public function setAccompagnement(CategorieEntity $boisson): void
    {
        $this->boisson = $boisson;
    }
}
