<?php

declare(strict_types=1);

namespace App\Controller\Menu;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Exception\NotFoundHttpException;
use App\Entity\Menu;

class GetOneController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');

        if (null === $menu = $entityManager->find(Menu::class, $request->get('id'))) {
            throw new NotFoundHttpException();
        }

        return new JsonResponse([
            'Data' => $menu
        ]);
    }
}
