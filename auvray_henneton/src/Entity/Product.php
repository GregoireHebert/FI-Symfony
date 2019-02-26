<?php

declare (strict_types = 1);
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
   public $id;

    /**
     * @ORM\Column(type="string", length=155)
     * @Assert\Type(type="string")
     * @Assert\Length(min="5")
     */
   public $title;
    /**
     * @ORM\Column(type="string", length=255) //verif coté sql
     * @Assert\Type(type="string") //verif coté applicatif
     */
   public $subtitle;

   /**
     * @ORM\Column(type="string") 
     * @Assert\Type(type="string")
     */
    public $corpus;

    /**
     * @ORM\Column(type="date") 
     * @Assert\Type(type="date")
     */
   public $createdAt;

}
?>


