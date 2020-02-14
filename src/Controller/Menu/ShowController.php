<?php

declare(strict_types=1);

namespace App\Controller\Menu;

use App\Entity\Menu;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowController
{
    public function __invoke(Request $request, Container $container, string $id)
    {
        $entityManager = $container->get('entity.manager');
        $menu = $entityManager->find(Menu::class, $id);

        return $this->show($menu);
    }

    public function show(Menu $menu)
    {
        return new JsonResponse(['data' => $menu->toJson()]);
    }
}
