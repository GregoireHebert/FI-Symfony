<?php

namespace App\Entity;

interface CategoryInterface
{
    public function getName(): string;

    public function setName(string $name);
}