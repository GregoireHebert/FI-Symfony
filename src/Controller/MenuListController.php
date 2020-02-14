<?php


namespace App\Controller;


use App\Entity\Menu;
use App\ORM\EntityManager;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class MenuListController
{
    public function __invoke(Request $request, Container $container)
    {
        /** @var EntityManager $entityManager */
        $entityManager = $container->get('entity.manager');

        $menus = $entityManager->findAll(Menu::class);

        // Un peu sale ...
        return new Response(serialize($menus));
    }
}