<?php

namespace App\Entity;

trait IdentifiableTrait
{
    /**
     * The identifier of the identifiable object
     */
    private $id;

    /**
     * Get the identifier of the identifiable object
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Set the identifier of the identifiable object
     */ 
    public function setId($id)
    {
        $this->id = $id;
    }
}
