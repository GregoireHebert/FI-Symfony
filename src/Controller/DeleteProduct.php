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
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class DeleteProduct
{

    public function __invoke(Request $request, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Product::class);
        $productId = $request -> get('id');
        $product = $repository->find($productId);
        $em->remove($product);
        $em->flush();
        return new Response('Delete');    }
}