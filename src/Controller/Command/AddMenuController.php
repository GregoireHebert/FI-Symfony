<?php

declare(strict_types=1);

namespace App\Controller\Command;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Exception\HttpException\NotFoundHttpException;
use App\Entity\Command;

class AddMenuController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');

        if (null === $command = $entityManager->find(Command::class, $request->get('commandId'))
        || null === $menu = $entityManager->find(Menu::class, $request->get('menuId'))) {
            throw new NotFoundHttpException();
        }

        $command->addMenu($menu);
        $entityManager->flush();
    
        return new JsonResponse([
            'Data' => $command
        ]);
    }
}
