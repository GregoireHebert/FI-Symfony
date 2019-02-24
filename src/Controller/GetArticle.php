<?php

declare(strict_types=1);

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class GetArticle
{
    public function __invoke(Request $request, EntityManagerInterface $em)
    {
        /*$repository = $em->getRepository(Product::class);
        $productId = $request->get('id');

        // dump($productId);
        $product = $repository->find($productId);

        return new JsonResponse($product);*/
    }
}