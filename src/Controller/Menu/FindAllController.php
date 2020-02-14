<?php

declare(strict_types=1);

namespace App\Controller\Menu;

use App\Entity\Menu;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class FindAllController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');
        $menus = $entityManager->findAll(Menu::class);

        return new JsonResponse([
            'Data' => $menus
        ]);
    }
}
