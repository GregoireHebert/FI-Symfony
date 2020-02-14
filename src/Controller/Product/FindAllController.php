<?php

declare(strict_types=1);

namespace App\Controller\Product;

use App\Entity\Product;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FindAllController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');
        $products = $entityManager->findAll(Product::class);

        return new JsonResponse([
            'Data' => $products
        ]);
    }
}
