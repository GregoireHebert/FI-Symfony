<?php 

declare(strict_types=1);

namespace App\Entity;

/**
 * Class wich represents a product category
 * 
 */
final class Category{


    private $id;

    private $name;

    public function __construct(){
        $this->id = \App\ORM\Util\UUID::v4();
    }

    public function getId() :string {
        return $this->id;
    }

    public function getName() :string {
        return $this->name;
    }

    public function setName($name) :void{
        $this->name = $name;
    }

}
?>