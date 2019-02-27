<?php

interface UserInterface
{
    public function getName(): string;
    public function setName(string $name): void;
    public function getUsername(): string;
}

interface Bdd
{
    public function save(): bool;
}

interface SavableUser extends UserInterface, Bdd
{

}

?>