<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class HomeController extends Controller
{
    /**
     * @Route("/")
     */
    public function home(Request $request, EntityManagerInterface $em)
    {
        $name = $request->get('name', 'Anonymous');
        $repository = $this->findAll($em);
        return $this->render('base.html.twig',['name' => $name, 'articles' => $repository]);
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