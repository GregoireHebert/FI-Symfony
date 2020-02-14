<?php

namespace App\Controller\Menu;

use App\Entity\Menu;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class IndexController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');
        $menus = $entityManager->findAll(Menu::class);
        $menus = array_map(function($menu) {
            return $menu->toJson();
        }, $menus);

        return new JsonResponse(['data' => $menus]);
    }
}