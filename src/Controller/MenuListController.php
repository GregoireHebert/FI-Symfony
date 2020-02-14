<?php


namespace App\Controller;


use App\Entity\Menu;
use App\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\Request;

class MenuListController
{
    public function __invoke(Request $request, Container $container)
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get('entity.manager');

        ob_start();

        $menus = $entityManager->findAll(Menu::class);
        var_dump($menus);
    }
}