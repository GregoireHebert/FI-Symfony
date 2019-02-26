<?php

declare (strict_types = 1);

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class HomeController{
    public function __invoke(Request $request){
        $name = $request->get('name','Anonymous');
        return new Response(<<<HTML
<html>
        <body>
        Welcome $name on this page
        </body>
</html>
HTML
);
    }
}
?>