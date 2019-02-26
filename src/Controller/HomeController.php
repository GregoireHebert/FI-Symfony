<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    public function home()
    {
        $entityManager = $this->getDoctrine()->getManager();

        //pour tout avoir sans tri desc
        //$posts = $entityManager->getRepository("App\Entity\Post")-> findAll();
        $posts = $entityManager->getRepository("App\Entity\Post")-> findBy([], ['createdAt' => 'DESC']);

        return $this->render('home.html.twig', [
            'posts' => $posts
        ]);
    }
}