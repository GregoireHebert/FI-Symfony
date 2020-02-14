<?php

namespace App\Entity;

class Command implements CommandInterface
{
    use IdentifiableTrait;

    /**
     * The list of products
     *
     * @var array
     */
    public $products;

    /**
     * The list of menus
     *
     * @var array
     */
    public $menus;

    /**
     * The status of command
     *
     * @var bool
     */
    public $status;

    public function __construct()
    {
        $this->id = \App\ORM\Util\UUID::v4();
    }

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
     * Add product to command
     * 
     * @param ProductInterface $product a product
     */
    public function addProduct(ProductInterface $product)
    {
        $this->products[] = $product;
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
     * Add menu to command
     * 
     * @param MenuInterface $menu a menu
     */
    public function addMenu(MenuInterface $menu)
    {
        $this->menus[] = $menu;
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
