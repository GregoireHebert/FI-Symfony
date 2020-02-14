<?php

declare(strict_types=1);

namespace App\Entity;

final class Category
{
    private $id;
    private $name;

    public function __construct(string $name)
    {
        $this->id = \App\ORM\Util\UUID::v4();
        $this->name = $name;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function toJson(): array
    {
        return [
            'id' => $this->$id,
            'name' => $this->$name
        ];
    }
}
