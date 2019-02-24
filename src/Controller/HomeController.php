<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController
{
    public function __invoke(Request $request)
    {
        $name = $request->get('name', 'Anonymous');
        return new Response(<<<HTML
<html>
        <head></head>
        <body>
            Welcome $name on the HomePage
        </body>
</html>
HTML
        );
    }
}