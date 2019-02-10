<?php
/**
 * Created by PhpStorm.
 * User: danneels
 * Date: 2019-01-24
 * Time: 12:00
 */

namespace App\Controller;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class UpdateProduct
{

    public function __invoke(Request $request, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Product::class);
        $productId = $request -> get('id');
        $product = $repository->find($productId);

        $product->name = $request->get('name');
        //$product->price  = $request->get('price');

        $em->flush();
        return new JsonResponse($product);
    }
}