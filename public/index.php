<?php

declare(strict_types=1);

require __DIR__.'/../vendor/autoload.php';

use App\MicroKernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$kernel = new MicroKernel();
$request = Request::createFromGlobals();

try {
    $response = $kernel->handleRequest($request);
    $response->send();
} catch (\Exception $e) {
    (new Response('Bad Request', 400))->send();
}
