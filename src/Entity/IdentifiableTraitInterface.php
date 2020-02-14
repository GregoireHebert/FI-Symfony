<?php

interface IdentifiableTraitInterface
{
    public function getId(): string;

    public function setId(string $id);
}
