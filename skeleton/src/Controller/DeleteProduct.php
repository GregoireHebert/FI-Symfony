<?php
/**
 * Created by PhpStorm.
 * User: kwet
 * Date: 24/01/19
 * Time: 12:16
 */

declare(strict_types=1);
namespace App\Controller;


use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DeleteProduct
{
    public function __invoke(Request $request, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Product::class);
        $productId = $request->get('id');
        $em->remove($repository->find($productId));
        $em->flush();

        return new Response("Suppression OK", Response::HTTP_OK);
    }
}