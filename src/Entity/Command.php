<?php

namespace App\Entity;

class Command 
{
    private $id;
    private $products;
    private $menus;

    /**
     * constructs the command entity
     * 
     * @param products: the list of products
     * @param menus: the list of menus
     */
    public function __construct(array $products = [], array $menus = [])
    {
        $this->id = \App\ORM\Util\UUID::v4();
        $this->products = $products;
        $this->menus = $menus;
    }

    /**
     * 
     */
    public function addProduct($product){
        array_push($this->products, $product);
    }

    /**
     * 
     */
    public function addMenu($menu){
        array_push($this->menus, $menu);
    }
    
}