<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\CategoryProduit;
use App\Util\Debugger;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController
{
    public function __invoke(Request $request, Container $container)
    {
        $entityManager = $container->get('entity.manager');
        $entityManager->resetDatabase();

        ob_start();
        $bigMac = new Produit(0, 6, 'BigMac', CategoryProduit::BURGER);
        $entityManager->persist($bigMac);
        $entityManager->flush();

        unset($bigMac, $entityManager, $toCompare);

        $entityManager = new \App\ORM\EntityManager();
  
        $collectionProduits = $entityManager->findAll(Produit::class);
        var_dump($collectionProduits);

        $content = ob_get_clean();

        return new Response($content);
    }
}
