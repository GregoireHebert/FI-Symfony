<?php

declare(strict_types=1);

namespace App\Controller\Category;

use App\Entity\Category;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FindAllController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');
        $categories = $entityManager->findAll(Category::class);

        return new JsonResponse([
            'Data' => $categories
        ]);
    }
}