<?php

namespace App\Entity;

interface CategoryInterface extends IdentifiableTraitInterface
{
    public function getName(): string;

    public function setName(string $name);
}