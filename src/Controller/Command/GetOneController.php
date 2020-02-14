<?php

declare(strict_types=1);

namespace App\Controller\Command;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Exception\HttpException\NotFoundHttpException;
use App\Entity\Command;

class GetOneController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');
        if (null === $command = $entityManager->find(Command::class, $request->get('commandId'))) {
            throw new NotFoundHttpException();
        }

        return new JsonResponse([
            'Data' => $command
        ]);
    }
}
