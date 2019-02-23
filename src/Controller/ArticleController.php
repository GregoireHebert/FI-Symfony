<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_list")
     */
    public function index(EntityManagerInterface $entityManager)
    {
        $articles = $entityManager->getRepository(Article::class)->findAll();

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }



    /**
     * @Route("/delete/{id}", name="article_delete")
     */
    public function delete(EntityManagerInterface $entityManager, Article $article)
    {
        $entityManager->remove($article);
        $entityManager->flush();

        return $this->redirectToRoute('article_list');
    }

    /**
     * @Route("/{id}", name="article_show")
     */
    public function show(Article $article)
    {
        return new Response($article->getTitle() . " - " . $article->getSubtitle());
    }
}
