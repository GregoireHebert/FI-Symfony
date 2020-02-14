<?php

declare(strict_types=1);

namespace App\Controller\Products;

use App\Entity\Product;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowController
{
    public function __invoke(Request $request, Container $container, string $id)
    {
        $entityManager = $container->get('entity.manager');
        $product = $entityManager->find(Product::class, $id);

        return $this->show($product);
    }

    public function show(Product $product)
    {
        return new JsonResponse(['data' => $product->toJson()]);
    }
}
