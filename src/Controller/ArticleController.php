<?php
namespace App\Controller;
use App\Entity\Article;
use App\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
class ArticleController extends AbstractController
{
    public function index(): Response
    {
        $articles = $this->getDoctrine()
            ->getRepository(Article::class)
            ->findAll();
        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

/*

    public function createAction(Request $request) {

        $article = new  BlogPost();
        $form = $this->createFormBuilder($article)
            ->add('name',TextType::class, array('attr' =>
                array('class' => 'form-control')))
            ->add('title',TextType::class, array('attr' =>
                array('class' => 'form-control')))
            ->add('subtitle',TextType::class, array('attr' =>
                array('class' => 'form-control')))
            ->add('corpus', TextareaType::class, array(
                'required'=>false,
                'attr' => array('class' => 'form-control')))
            ->add('tag_id',IntegerType::class, array('attr' =>
                array('class' => 'form-control')))
            ->add('Ajouter', SubmitType::class, array(
                'label' => 'Create',
                'attr' =>array('class' => 'btn-btn-primary mt-3')
            ))
            ->getForm();

        $form->handleRequest($request);
    } */


    public function new(Request $request): Response
    {
        $article = new Article();
        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($article);
            $entityManager->flush();
            $this->addFlash('success', "L'article a été ajouté");
            return $this->redirectToRoute('article_show', array(
                'idArticle' => $article->id,
            ));
        }
        return $this->render('article/new.html.twig', [
            'article' => $article,
            'form' => $form->createView(),
        ]);
    }
    public function show(int $idArticle): Response
    {
        $article = $this->getDoctrine()
            ->getRepository(Article::class)
            ->find($idArticle);
        if ($article == null) {
            return $this->index();
        }
        return $this->render('article/show.html.twig', [
            'article' => $article,
        ]);
    }


    public function delete(Request $request, Article $article): Response
    {
        if ($this->isCsrfTokenValid('delete'.$article->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($article);
            $entityManager->flush();
        }

        return $this->redirectToRoute('article_index');
    }
}