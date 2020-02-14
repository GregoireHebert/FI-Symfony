<?php

declare(strict_types=1);

namespace App\Controller\Products;

use App\Entity\Product;
use App\Entity\Category;
use App\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UpdateController
{
    public function __invoke(Request $request, Container $container, int $id)
    {
        $entityManager = $container->get('entity.manager');
        $product = $entityManager->find(Product::class, $id);

        return $this->update($entityManager, $request, $product);
    }

    public function update(EntityManager $entityManager, Request $request, Product $product)
    {
        $category = $entityManager->find(Category::class, $request->get('category_id'));

        $product->setName($request->get('name'));
        $product->setPrice($request->get('price'));
        $product->setCategory($category);

        $entityManager->persist($product);
        $entityManager->flush();

        return new JsonResponse(['data' => $product->toJson()]);
    }
}
