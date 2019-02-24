<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ArticleController
{
    public function __invoke(ValidatorInterface $validator , Request $request, EntityManagerInterface $em)
    {
        /*$product = new Product();
        $product->name = $request->get('name');
        $product->price = $request->get('price');

        $errors = $validator->validate($product);

        $em->persist($product);
        $em->flush();

        dump($product);

        return new Response('');*/
    }
}