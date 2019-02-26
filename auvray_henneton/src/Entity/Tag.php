<?php

declare (strict_types = 1);
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="tag")
 */
class Tag{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
   public $id;

    /**
     * @ORM\Column(type="string", length=155)
     * @Assert\Type(type="string")
     * @Assert\Length(min="")
     */
   public $name;
  
}
?>


