<?php
/**
 * Created by PhpStorm.
 * User: danneels
 * Date: 2019-01-24
 * Time: 11:46
 */

namespace App\Controller;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class GetProduct
{

    public function __invoke( Request $request, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Product::class);
        $productId = $request -> get('id');
        //dump($productId);
        $product = $repository->find($productId);
        return new JsonResponse($product);
    }

    /**public function __invoke(Product $product)
    {
        $repository = $em->getRepository(Product::class);
        $productId = $request -> get('id');
        //dump($productId);
        $product = $repository->find($productId);
        return new JsonResponse($product);
    }**/
}