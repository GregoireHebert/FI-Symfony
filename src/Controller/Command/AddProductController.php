<?php

declare(strict_types=1);

namespace App\Controller\Command;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Exception\NotFoundHttpException;
use App\Entity\Command;

class AddProductController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');

        if (null === $command = $entityManager->find(Command::class, $request->get('commandId'))
        || null === $product = $entityManager->find(Product::class, $request->get('productId'))) {
            throw new NotFoundHttpException();
        }

        $command->addProduct($product);
        $entityManager->flush();
    
        return new JsonResponse([
            'Data' => $command
        ]);
    }
}
