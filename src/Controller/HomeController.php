<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function home()
    {
        $entityManager = $this->getDoctrine()->getManager();
        $posts = $entityManager->getRepository("App\Entity\Post")-> findAll();

        return $this->render('home.html.twig', [
            'posts' => $posts
        ]);
    }
}