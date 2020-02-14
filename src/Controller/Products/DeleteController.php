<?php

declare(strict_types=1);

namespace App\Controller\Products;

use App\Entity\Product;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DeleteController
{
    public function __invoke(Request $request, Container $container, int $id)
    {
        $entityManager = $container->get('entity.manager');
        $product = $entityManager->find(Product::class, $id);

        $this->delete($entityManager, $product);
    }

    public function delete(EntityManager $entityManager, Product $product)
    {
        $entityManager->remove($product);
        $entityManager->flush();

        return new JsonResponse('', 204);
    }
}
