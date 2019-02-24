<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class GetArticle extends Controller
{
    /**
     * @Route("/{id}", methods={"GET"}, name="get_article"))
     */
    public function __invoke(Request $request, EntityManagerInterface $em)
    {
        $repository = $em->getRepository(Article::class);
        $articleId = $request->get('id');
        $articles = $this->findAll($em);

        $article = $repository->find($articleId);
        
        return $this->render('article.html.twig', ['size'=> count($articles),'article' => $article]);
        
    }

    public function findAll( EntityManagerInterface $entityManager): array
    {
    
        $query = $entityManager->createQuery(
            'SELECT p.id,p.title,p.corpus,p.subtitle,p.createdAt,p.tags
            FROM App\Entity\Article p'
        );
        return $query->execute();
    }
}