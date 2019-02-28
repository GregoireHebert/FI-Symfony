<?php
namespace App\Controller;
use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogpostsController extends AbstractController
{
    public function new(Request $request): Response
    {
        $article = new Article();

    }
}