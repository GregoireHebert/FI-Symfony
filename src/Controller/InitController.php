<?php


namespace App\Controller;


use App\Entity\Menu;
use App\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;

class InitController
{
    public function __invoke(Request $request, Container $container)
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get('entity.manager');
        $entityManager->resetDatabase();

        ob_start();
        $menu1 = new Menu("Best Of", 7.5);

        $entityManager->persist($menu1);

        $entityManager->flush();
    }
}