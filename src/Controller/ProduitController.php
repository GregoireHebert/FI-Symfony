<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Produit;
use App\Util\Debugger;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProduitController
{
    public function __invoke(Request $request, Container $container)
    {
        /** @var Debugger $debugger */
        $debugger = $container->get('debug');

        $entityManager = $container->get('entity.manager');
        
        ob_start();

        echo "<h1>Liste des produits</h1>";
        echo "<table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>";
        $listeProduits = $entityManager->findAll(Produit::class);
        foreach ($listeProduits as $pdt){
            echo "<tr><td>".$pdt->getNom()."</td>"."<td>".$pdt->getPrix()."</td></tr>";
        }
        echo " </tbody></table>";

        return new Response($content);
    }
}
