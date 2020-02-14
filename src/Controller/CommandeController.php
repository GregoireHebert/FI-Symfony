<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Commande;
use App\Entity\User;
use App\Entity\CategoryProduit;
use App\Entity\CategoryMenu;
use App\Util\Debugger;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommandeController
{
    public function __invoke(Request $request, Container $container)
    {


        $entityManager = $container->get('entity.manager');
        $entityManager->resetDatabase();

        ob_start();
        $bigMac = new Produit(0, 6, 'BigMac', CategoryProduit::BURGER);
        $cheeseBurger = new Produit(1, 4, 'CheeseBurger', CategoryProduit::BURGER);
        $entityManager->persist($bigMac);
        $entityManager->persist($cheeseBurger);
        $entityManager->flush();

        $arrayProduct= ["bigMac" => $bigMac, "cheeseBurger" => $cheeseBurger];

        $user = new User(0,"User1");

        $commande = new Commande(0,$arrayProduct,$user,CategoryMenu::BEST_OF);

        $entityManager->flush();

        echo "Commande id=".$commande->getId()." passée par ".$commande->getUser()->getName()." </br>";
        echo ""

        $entityManager->persist($commande);

        $entityManager = new \App\ORM\EntityManager();
        $collectionCommande = $entityManager->findAll(Commande::class);

        $content = ob_get_clean();

        return new Response($content);
    }
}
