<?php
/**
 * Created by PhpStorm.
 * User: kwet
 * Date: 24/01/19
 * Time: 10:51
 */

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 */
class Product
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="5")
     */
    public $name;

    /**
     * @ORM\Column(type="float")
     * @Assert\Type(type="float")
     */
    public $price;

}