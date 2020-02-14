<?php

declare(strict_types=1);

namespace App\Controller\Products;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CreateController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');

        $this->create($entityManager, $request);
    }

    public function create(EntityManager $entityManager, Request $request)
    {
        $category = $entityManager->find(Category::class, $request->get('category_id'));
        $product = new Product($request->get('name'), $request->get('price'), $category);

        $entityManager->persist($product);
        $entityManager->flush();

        return new JsonResponse(['data' => $product], 201);
    }
}
