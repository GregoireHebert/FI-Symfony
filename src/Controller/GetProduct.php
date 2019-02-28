<?php
/**
 * Created by PhpStorm.
 * User: kwet
 * Date: 24/01/19
 * Time: 11:45
 */

declare(strict_types=1);
namespace App\Controller;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetProduct
{
    public function __invoke(Request $request, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Product::class);
        $productId = $request->get('id');

        //dump($productId);
        $product = $repository->find($productId);
        return new JsonResponse($product);
    }
}