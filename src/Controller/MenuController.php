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
        // $allPlat = listerProduitsParCategorie($ref);
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

        //Remplacer value par id?
        foreach($allPlat as $plat) {
            echo "<input type=\"checkbox\" name=\"plat\" value=\"plat1\">
            <label for=\"plat1\">".$plat->getNom()."</label><br>";
         }


        echo "<br>2. Choisir un accompagnement<br>";

        foreach($allPlat as $accompagnement) {
            echo "<input type=\"checkbox\" name=\"accompagnement\" value=\"plat1\">
            <label for=\"plat1\">".$accompagnement->getNom()."</label><br>";
         }


        echo "<br>3. Choisir une boisson<br>";
        foreach($allPlat as $boisson) {
            echo "<input type=\"checkbox\" name=\"accompagnement\" value=\"plat1\">
            <label for=\"plat1\">".$boisson->getNom()."</label><br>";
         }

         echo "<br><input class=\"bouton\" type=\"submit\" value=\"Valider\"/>";      
     
         echo "</form>";
        
      return new Response($content);

        
    }

     // add à la current command
     public function test() {
        alert("ok");
        return true;
    }
  
}
