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

    public function __construct(){

        $this->id = \App\ORM\Util\UUID::v4();
        $this->products = array();
    }

    public function getId() :string{

        return $this->id;
    }

    public function getProducts() : array{
        return $this->products;
    }

}

?>