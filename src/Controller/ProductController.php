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
            new Produit(0, 5, 'Big Tasty', CategoryProduit::BURGER),
            new Produit(0, 6, 'Le CBO', CategoryProduit::BURGER),
            new Produit(0, 5, 'Le McChicken', CategoryProduit::BURGER),
            new Produit(0, 6, 'Le Triple Cheeseburger Bacon', CategoryProduit::BURGER),

            new Produit(0, 3, 'Le P\'tit Wrap Veggie', CategoryProduit::PETITE_FAIM),
            new Produit(0, 2, 'Le Croque McDo', CategoryProduit::PETITE_FAIM),
            new Produit(0, 3, 'Les Chicken McNuggets', CategoryProduit::PETITE_FAIM),

            new Produit(0, 2, 'Frites', CategoryProduit::FRITES),
            new Produit(0, 2, 'Potatoes', CategoryProduit::FRITES),

            new Produit(0, 1, 'Ketchup', CategoryProduit::SAUCE),
            new Produit(0, 1, 'Mayonnaise', CategoryProduit::SAUCE),

            new Produit(0, 7, 'La salade Italian Mozza', CategoryProduit::SALADE),
            new Produit(0, 8, 'La salade Chicken Caeser', CategoryProduit::SALADE),

            new Produit(0, 3, 'Le Sundae', CategoryProduit::DESSERT),
            new Produit(0, 2, 'Le Donut Confetti', CategoryProduit::DESSERT),
            new Produit(0, 3, 'Le Very Parfait', CategoryProduit::DESSERT),

            new Produit(0, 2, 'Coca Cola', CategoryProduit::BOISSON),
            new Produit(0, 2, 'Sprite', CategoryProduit::BOISSON),
            new Produit(0, 2, 'Ice Tea', CategoryProduit::BOISSON)
        );

        for($i = 0; $i < count($productsToCreate); $i++) {
            $entityManager->persist($productsToCreate[$i]);
        }

        $entityManager->flush();
  
        $collectionProduits = $entityManager->findAll(Produit::class);

        $html = "<html>\n<body>\n<h1>Liste des produits</h1>\n";
        $html .= "<table border=\"1\">\n<tr>\n<th>Nom</th>\n<th>Prix</th>\n<th>Catégorie</th>\n<th>Quantité</th>\n<th>Action</th>\n";
    
        foreach($collectionProduits as $produit) {
            $html .= "<tr>\n";
            $html .= "<td>".$produit->getName()."</td>\n";
            $html .= "<td>".$produit->getPrice()."</td>\n";
            $html .= "<td>".$produit->getCategoryProduits()."</td>\n";
            $html .= "<td>".$produit->getQuantite()."</td>\n";
            $html .= "<td><button type=\"button\">Ajouter à la commande</button>\n";
            $html .= "</tr>\n";
        }

        $html .= "</table>\n";
        $html .= "</body>\n</html>";

        echo($html);

        $content = ob_get_clean();

        return new Response($content);
    }
}
