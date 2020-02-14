<?php 

declare(strict_types=1);

namespace App\Entity;
/**
 * 
 * Class wich contains all informations about a menu
 */
final class Menu{

    private $id;

    private $name;

    private $price;

    private $products;

    public function __construct(string $name, float $price){

        $this->id = \App\ORM\Util\UUID::v4();
        $this->name = $name;
        $this->price = $price;
        $this->products = array();
    }

    public function getId() :string{

        return $this->id;
    }

    public function getProducts() : array{
        return $this->products;
    }

    public function getName() :string{
        return $this->name;
    }

    public function getPrice() :float{
        return $this->price;
    }

    public function setName($name) :void{
        $this->name = $name;
    }

    public function setPrice($price) :void{
        $this->price = $price;
    }

    public function setProducts($products) :void{
        $this->products = $products;
    }
}

?>