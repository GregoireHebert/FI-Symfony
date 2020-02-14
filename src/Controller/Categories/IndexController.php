<?php

declare(strict_types=1);

namespace App\Controller\Categories;

use App\Entity\Category;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IndexController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');
        $categories = $entityManager->findAll(Category::class);
        $categories = array_map(function($category) {
            return $category->toJson();
        }, $categories);

        $this->index($categories);
    }

    public function index(array $categories)
    {
        return new JsonResponse(['data' => $categories]);
    }
}
