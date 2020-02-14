<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Util\Debugger;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
 {
    private $twigService;
      function __constructor($twigService){
         this.$twigService = $twigService;
      }

      public function __invoke(Request $request, Container $container)
      {
     }
}
