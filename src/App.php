<?php

declare(strict_types=1);
require_once '../vendor/autoload.php';
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Cookie;


echo '<pre>';
//var_dump($_SERVER);
//var_dump($_POST);
//var_dump($_REQUEST);
//var_dump($_GET);
//var_dump($_COOKIE);
//var_dump($_SESSION);
echo'</pre>';

$request = Request::createFromGlobals();

$foo = $request->query->get('foo');

$response = new Response(
<<<HTML
<html>
    <head>
    </head>
    <body>Salut $foo</body>
</html> 
HTML, Response::HTTP_BAD_REQUEST
);

$response->send();
$response->headers->setCookie(new Cookie('foo', 'bar'));
