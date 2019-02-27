<?php

class Admin extends User
{
    public function getUsername() : string
    {
        return "Admin {$this->name}";
    }
}

?>