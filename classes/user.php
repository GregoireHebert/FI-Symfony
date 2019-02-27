<?php

include 'userInterface.php';

Abstract class User implements SavableUser
{
    protected $name;

    public static $count = 0;

    public function getName(): string
    {
        // :: car c'est utilisé avec static, ça remplace ->, static peut etre remplacé par self
        static::$count += 1;
        return $this->name;
    }

    public function setName(string $newName): void
    {
        $this->name = $newName;
    }

    public function save(): bool
    {
        return true;
    }
}

?>