<?php 


declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Category;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/***
 * 
 * Controller wich provides the products list
 * 
 */
class ProductListController{

    public function __invoke(Request $request, Container $container){

        $entityManager = $container->get('entity.manager');
        $entityManager->resetDatabase();
        $category = new Category();
        $category->setName("Burger");

        $product = new Product();
        
        $product->setName("Big mac");
        $product->setPrice(7.95);
        $product->setCategory($category);

        $entityManager->persist($product);
        $entityManager->flush();
        $products = $entityManager->findAll(Product::class);
        
        return new JsonResponse(serialize($products));

        
    }
} 

?>