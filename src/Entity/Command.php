<?php

namespace App\Entity;

class Command 
{
    private $id;
    private $products;
    private $menus;
    private $total;

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
        $this->total = 0;
    }

    /**
     * gets the command id
     * 
     * @return the command id
     */
    public function getId() : string 
    {
        return $this->id;
    }

    /**
     * gets the total price of the command
     * 
     * @return the total price
     */
    public function getTotal() :  float 
    {
        return $this->total;
    }


    /**
     * gets products list
     */
    public function getProducts() : array
    {
        return $this->products;
    }

    public function getMenus() : array
    {
        return $this->menus;
<<<<<<< HEAD
=======
    }

    /**
     * adds product in products list
     * 
     * @param prodcuct : the product to add
     */
    public function addProduct(Product $product)
    {
        $this->products[$product->getName()] += 1;

        $this->total += $product->getPrice();
>>>>>>> 0083357dac2b32721a6d893fa2732702943c7957
    }

    /**
     * adds product in products list
     * 
     * @param prodcuct : the product to add
<<<<<<< HEAD
     */
    public function addProduct(Product $product)
    {
        $this->products[$product->getName()] += 1;

        $this->total += $product->getPrice();
    }

    /**
     * adds product in products list
     * 
     * @param prodcuct : the product to add
     * @param qty : the quantity of the ptoduct
     */
=======
     * @param qty : the quantity of the ptoduct
     */
>>>>>>> 0083357dac2b32721a6d893fa2732702943c7957
    public function addProductQuantity(Product $product, int $qty)
    {
        $this->products[$product->getName()] += $qty;

        $this->total += ($product->getPrice() * $qty);
    }

    /**
     * adds menu in the menus list
     * 
     * @param menu : the menu list
     */
    public function addMenu(Menu $menu)
    {
        $this->menus[$menu->getName()] += 1;

        $this->total += $menu->getPrice();
    }

    /**
     * adds menu in the menus list
     * 
     * @param menu : the menu list
     * @param qty : the quantity of the menu
     */
    public function addMenuQuantity(Menu $menu, int $qty){
        
        $this->menus[$menu->getName()]+= $qty;

        $this->total += ($menu->getPrice() * $qty);
<<<<<<< HEAD
    }

    /**
     * return command in json format
     */
    public function toJson(): array
    {
        return [
            'id' => $this->$id,
            'price' => $this->$price,
            'products' => $this->products,
            'menus' => $this->menus
        ];
=======
>>>>>>> 0083357dac2b32721a6d893fa2732702943c7957
    }
    
}