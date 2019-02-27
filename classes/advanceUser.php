<?php

class AdvanceUser extends User
{
    public function getUsername() : string
    {
        return $this->name;
    }
}

?>