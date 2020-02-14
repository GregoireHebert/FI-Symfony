<?php

namespace App\Entity;

class Command implements CommandInterface
{
    /**
     * The list of products
     *
     * @var array
     */
    private $products;

    /**
     * The list of menus
     *
     * @var array
     */
    private $menus;

    /**
     * The status of command
     *
     * @var bool
     */
    private $status;

    /**
     * Get the list of products
     *
     * @return  array
     */ 
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set the list of products
     *
     * @param  array  $products  The list of products
     *
     */ 
    public function setProducts(array $products)
    {
        $this->products = $products;
    }

    /**
     * Get the list of menus
     *
     * @return  array
     */ 
    public function getMenus()
    {
        return $this->menus;
    }

    /**
     * Set the list of menus
     *
     * @param  array  $menus  The list of menus
     *
     */ 
    public function setMenus(array $menus)
    {
        $this->menus = $menus;
    }


    /**
     * Get the status of command
     *
     * @return  bool
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the status of command
     *
     * @param  bool  $status  The status of command
     *
     */ 
    public function setStatus(bool $status)
    {
        $this->status = $status;
    }
}
