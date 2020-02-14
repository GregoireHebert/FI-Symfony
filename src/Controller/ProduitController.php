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
        echo "<form method=\"post\" action=\"/\">";
        echo "<table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Nom</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>";
        $listeProduits = $entityManager->findAll(Produit::class);
        if(empty($listeProduits)){
            $this->initializeBDD($container);
            $listeProduits = $entityManager->findAll(Produit::class);
        }
        foreach ($listeProduits as $pdt){
            echo "<tr><td><input type=\"checkbox\" name=".$pdt->getId()." value=".$pdt->getId()."></td>";
            echo "<td>".$pdt->getNom()."</td>"."<td>".$pdt->getPrix()."</td></tr>";
        }
        echo " </tbody></table>";

        echo "<br><input class=\"bouton\" type=\"submit\" value=\"Valider\"/>";      
        echo "</form>";

        return new Response($content);
    }

    public function initializeBDD(Container $container){
        /** @var Debugger $debugger */
        $debugger = $container->get('debug');

        $entityManager = $container->get('entity.manager');
        
        ob_start();
        $produit1 = new Produit();
        $produit1->setNom('produit1');
        $produit1->setPrix(1.0);

        $entityManager->persist($produit1);

        $produit2 = new Produit();
        $produit2->setNom('produit2');
        $produit2->setPrix(2.0);

        $entityManager->persist($produit2);

        $produit3 = new Produit();
        $produit3->setNom('produit3');
        $produit3->setPrix(3.0);

        $entityManager->persist($produit3);
    }
}
