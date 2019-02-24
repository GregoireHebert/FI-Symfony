<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class UpdateArticle
{
    public function __invoke(Request $request, EntityManagerInterface $em)
    {
        /*$repository = $em->getRepository(Product::class);
        $productId = $request->get('id');

        // dump($productId);
        $product = $repository->find($productId);
        $product->name = $request->get('name');
        $product->price = $request->get('price');

        $em->persist($product);
        $em->flush();

        return new JsonResponse($product);*/
    }
}