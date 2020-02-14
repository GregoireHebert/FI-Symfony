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
         echo('<h3>Votre commande en cours</h3>');
         $container->get('commandeService')->afficherCommande($container->get('commandeService')->getCurrentCommande());
         echo('</br><a href="/menu">Ajouter un menu</a>');
         echo('</br><a href="/produit">Ajouter un produit</a>');
         $addition =  $container->get('commandeService')->calculerAddition($container->get('commandeService')->getCurrentCommande());
         echo('</br>Total: '.$addition.'€');
         echo('</br><a href="/payer">Payer</a>');
     }

     
}
