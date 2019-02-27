<?php

class Index
{
    public function displayName(): string
    {
        return 'Valentin';
    }

    //avec & on va passer la référence et donc les modifications sur $name seront effectuées en dehors de la methode
    public function displayNameWithParameter(string &$name): string
    {
        $name = 'Hello ' . $name;
        $name .= 'world';
        return $name;
    }

    public function displayNameWithObjectParameter(UserInterface $user): string
    {
        return 'Hello ' . $user->getName(). ' world' . PHP_EOL;
    }
}

?>