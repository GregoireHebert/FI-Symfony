<?php

namespace App\Controller\Command;

use App\Entity\{
    Command,
    Menu,
    Product,
    Category
};

use App\ORM\EntityManager;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\DependencyInjection\Container;

class CommandListController
{
    public function __invoke(Request $request, Container $container)
    {
        $em = new EntityManager();

        $p1 = new Product('product 1', 15.0, new Category("cat 1"));
        $p2 = new Product('product 2', 25.0, new Category("cat 2"));
        $p3 = new Product('product 3', 30.0, new Category("cat 3"));
        $p4 = new Product('product 4', 10.0, new Category("cat 4"));

        $m1 = new Menu("menu");
        $m1->setProducts([$p1, $p2]);

        $command = new Command();
        $command->addProductQuantity($p3, 2);
        $command->addProduct($p4);
        $command->addProduct($p4);
        $command->addMenu($m1);

        $em->persist($command);
        $em->flush();

        var_dump($command->getProducts());

    }
}