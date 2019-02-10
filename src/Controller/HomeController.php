<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HomeController
{
    public function __invoke(Request $request)
    {
        $name = $request->get('name','anonymous');
        return new Response(<<<HTML
<html>
<head></head>
<body>
welcome on the homepage $name
</body>
</html>
HTML
        );
    }

}