<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\DoStuff;
use App\Util\Debugger;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\CategorieService;
use App\Entity\Produit;
use App\Entity\Menu;

class MenuController
{
    public function __invoke(Request $request, Container $container)
    {
        /** @var Debugger $debugger */
        $debugger = $container->get('debug');

        $entityManager = $container->get('entity.manager');
        $entityManager->resetDatabase();

        ob_start();
        $menu = new Menu();

        echo "<h1>Créer un menu</h1> <br>";
        echo "Prix du menu : ".$menu->getPrix()." €<br><br>";

        echo "<form method=\"post\" action=\"/\">";

        echo "1. Choisir un plat<br>";
        
        $p1 = new Produit();
        $p1->setNom("Mon Produit");
        $p1->setPrix(10.0);

        $p2 = new Produit();
        $p2->setNom("Mon Produit 2");
        $p2->setPrix(5.0);

        $p3 = new Produit();
        $p3->setNom("Mon Produit 3");
        $p3->setPrix(5.0);

        $allPlat = array($p1,$p2,$p3);
        // Ajouter l'id en de la catégorie plat
        // $allPlat = listerProduitsParCategorie($id);

        foreach($allPlat as $plat) {
            echo "<input type=\"checkbox\" name=\"plat\" value=\"idPlat\">
            <label for=\"idPlat\">".$plat->getNom()."</label><br>";
         }


        echo "<br>2. Choisir un accompagnement<br>";

         $allAccompagnement = $allPlat;
        // Ajouter l'id en de la catégorie accompagnement
        // $allAccompagnement = listerProduitsParCategorie($id);

        foreach($allAccompagnement as $accompagnement) {
            echo "<input type=\"checkbox\" name=\"accompagnement\" value=\"idAccompagnement\">
            <label for=\"idAccompagnement\">".$accompagnement->getNom()."</label><br>";
         }


        echo "<br>3. Choisir une boisson<br>";

        $allBoissons = $allPlat;
        // Ajouter l'id en de la catégorie boisson
        // $allBoissons = listerProduitsParCategorie($id);

        foreach($allBoissons as $boisson) {
            echo "<input type=\"checkbox\" name=\"accompagnement\" value=\"idBoisson\">
            <label for=\"idBoisson\">".$boisson->getNom()."</label><br>";
         }


         // TODO : Add au menu les 3 produits sélectionnés + add à la current commande
         echo "<br><input class=\"bouton\" type=\"submit\" value=\"Valider\"/>";      
     
         echo "</form>";
        
      return new Response($content);

    }

}
