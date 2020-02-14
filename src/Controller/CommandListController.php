<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Command;
use App\Util\Debugger;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommandListController
{
    public function __invoke(Request $request, Container $container)
    {

        
        $entityManager = $container->get('entity.manager');
        ob_start();
        $collectionOfCommand = $entityManager->findAll(Command::class);
        echo 'get the full collection of command : <br/><pre>';
        var_dump($collectionOfCommand);
        echo '</pre>';

    }

}
