<?php
/**
 * Created by PhpStorm.
 * User: danneels
 * Date: 2019-01-24
 * Time: 11:27
 */

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController
{
    public function __invoke(ValidatorInterface $validator,Request $request, EntityManagerInterface $em)
    {
        $product = new Product();
        $product->name = $request->get('name');
        $product->price  = $request->get('price');

        $error = $validator->validate($product);

        dump($error);
        dump($request->get('name'));
        dump($request->get('price'));

        $em->persist($product);
        $em->flush();
        return new Response('Ajout');
    }

}