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
        $productsToCreate = array(
            new Produit(0, 4, 'Big Mac', CategoryProduit::BURGER),
            new Produit(1, 5, 'Big Tasty', CategoryProduit::BURGER),
            new Produit(2, 6, 'Le CBO', CategoryProduit::BURGER),
            new Produit(3, 5, 'Le McChicken', CategoryProduit::BURGER),
            new Produit(4, 6, 'Le Triple Cheeseburger Bacon', CategoryProduit::BURGER),

            new Produit(5, 3, 'Le P\'tit Wrap Veggie', CategoryProduit::PETITE_FAIM),
            new Produit(6, 2, 'Le Croque McDo', CategoryProduit::PETITE_FAIM),
            new Produit(7, 3, 'Les Chicken McNuggets', CategoryProduit::PETITE_FAIM),

            new Produit(8, 2, 'Frites', CategoryProduit::FRITES),
            new Produit(9, 2, 'Potatoes', CategoryProduit::FRITES),

            new Produit(10, 1, 'Ketchup', CategoryProduit::SAUCE),
            new Produit(11, 1, 'Mayonnaise', CategoryProduit::SAUCE),

            new Produit(12, 7, 'La salade Italian Mozza', CategoryProduit::SALADE),
            new Produit(13, 8, 'La salade Chicken Caeser', CategoryProduit::SALADE),

            new Produit(14, 3, 'Le Sundae', CategoryProduit::DESSERT),
            new Produit(15, 2, 'Le Donut Confetti', CategoryProduit::DESSERT),
            new Produit(16, 3, 'Le Very Parfait', CategoryProduit::DESSERT),

            new Produit(17, 2, 'Coca Cola', CategoryProduit::BOISSON),
            new Produit(18, 2, 'Sprite', CategoryProduit::BOISSON),
            new Produit(19, 2, 'Ice Tea', CategoryProduit::BOISSON)
        );

        for($i = 0; $i < count($productsToCreate); $i++) {
            $entityManager->persist($productsToCreate[$i]);
        }

        $entityManager->flush();
  
        $collectionProduits = $entityManager->findAll(Produit::class);
        var_dump(count($collectionProduits));

        $content = ob_get_clean();

        return new Response($content);
    }
}
