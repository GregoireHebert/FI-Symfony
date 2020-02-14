<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\DoStuff;
use App\Util\Debugger;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MyController
{
    public function __invoke(Request $request, Container $container)
    {
        /** @var Debugger $debugger */
        $debugger = $container->get('debug');
        $debugger->dump($request);

        $entityManager = new \App\ORM\EntityManager();
        $collectionProduits = $entityManager->findAll(Produits::class);
        var_dump($collectionProduits);

        $content = ob_get_clean();

        // $jsonResponse = new JsonResponse(['Data' => 'stuff']);
        return new Response($content);
    }
}
