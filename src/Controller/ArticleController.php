<?php

declare(strict_types=1);
namespace App\Controller;

use App\Entity\Article;
use App\Entity\ArticleSearch;
use App\Form\ArticleSearchType;
use App\Form\ArticleType;
use App\Repository\ArticleRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ArticleController extends AbstractController
{

    public function index(Request $request, PaginatorInterface $paginator, ArticleRepository $articleRepository): Response
    {

        $search = new ArticleSearch();
        $form = $this->createForm(ArticleSearchType::class, $search);
        $form->handleRequest($request);

        $articles = $paginator->paginate(
            $articleRepository->findAllQuery($search),
            $request->query->getInt('page', 1),
            3
        );



        return $this->render('article/index.html.twig', [
            'mainNavHome'=>true,
            'title'=>'Accueil',
            'articles' => $articles,
            'form' => $form->createView(),
        ]);
    }

    public function new(Request $request): Response
    {
        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
            $this->addFlash('success', 'Article bien ajouté avec succès');

            return $this->redirectToRoute('article_index');
        }

        return $this->render('article/new.html.twig', [
            'mainNavBlogposts'=>true,
            'title'=>'blogposts',
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }


    public function show(Article $article): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }


    public function edit(Request $request, Article $article): Response
    {
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Article bien modifié');

            return $this->redirectToRoute('article_index', [
                'id' => $article->getId(),
            ]);
        }

        return $this->render('article/edit.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }

    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
            $this->addFlash('success', 'Article bien supprimé');
        }

        return $this->redirectToRoute('article_index');
    }
}
