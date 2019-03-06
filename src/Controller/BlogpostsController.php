<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 20/02/2019
 * Time: 22:45
 */

namespace App\Controller;


use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogpostsController extends AbstractController
{

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


}