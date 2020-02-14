<?php

declare(strict_types=1);

namespace App\Controller\Products;

use App\Entity\Product;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');
        $products = $entityManager->findAll(Product::class);
        $products = array_map(function($product) {
            return $product->toJson();
        }, $products);

        return $this->index($products);
    }

    public function index(array $products)
    {
        return new JsonResponse(['data' => $products]);
    }
}
