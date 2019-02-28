<?php
/**
 * Created by PhpStorm.
 * User: kwet
 * Date: 24/01/19
 * Time: 11:26
 */

declare(strict_types=1);
namespace App\Controller;


use App\Entity\Product;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ProductController
{
    public function __invoke(ValidatorInterface $validator, Request $request, RegistryInterface $registry){
        dump($request->get('name'));
        dump($request->get('price'));

        $product = new Product();
        $product->name = $request->get('name');
        $product->price = $request->get('price');

        $errors = $validator->validate($product);
        $em = $registry->getEntityManagerForClass(Product::class);
        $em->persist($product);
        $em->flush();
        dump($product);
        return new Response("");
    }
}