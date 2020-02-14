<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Util\Debugger;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Commande;
use App\Entity\Menu;
use App\Entity\Produit;
use App\Service\CommandeService;

class HomeController{

      
      public function __invoke(Request $request, Container $container)
      {  

         $container->get('commandeService')->afficherCommande($this->createFakeCommande());
     }

     private function createFakeCommande(){
      $commande = new Commande();
      $frite = new Produit();
      $frite->setPrix(3.0);
      $frite->setNom('Frites');

      $menu = new Menu();
      $menu->setPrix(9.0);
      
      $commande->setProduits(array($frite));
      $commande->setMenus(array($menu));

      return $commande;
     }
}
