<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DisplayArticleController extends AbstractController
{
    public function display($id)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $posts = $entityManager->getRepository("App\Entity\Post")-> findAll();

        return $this->render('article.html.twig', [
            'post' => $id
        ]);
    }
}