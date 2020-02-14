<?php

namespace App\Controller\Menu;

use App\Entity\Menu;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class StoreController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');
        $name = $request->get('name', '');

        $menu = new Menu($name);

        $entityManager->persist($menu);
        $entityManager->flush();

        return new JsonResponse(['data' => $menu->toJson()], 201);
    }
}