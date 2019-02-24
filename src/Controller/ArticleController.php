<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Tag;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/", name="article_list")
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function index()
    {
        return $this->redirectToRoute('article_list_paginated', ['page' => 1]);
    }

    /**
     * @Route("/tag/{nameTag}", name="article_list_filtered",methods={"GET"})
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function indexFiltered(EntityManagerInterface $entityManager, string $nameTag)
    {
        $tag = $entityManager->getRepository(Tag::class)->findByNameIgnoreCase($nameTag);
        if ($tag == null) {
            $this->get('session')->getFlashBag()->add('warning', 'Ce tag n\'existe pas');
            return $this->redirectToRoute('article_list');
        }
        $articles = $entityManager->getRepository(Article::class)->findByTagOrderByDateCreated($tag);

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * @Route("/tag", name="article_list_filtered_post", methods={"POST"})
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function indexFilteredPost(Request $request)
    {
        return $this->redirectToRoute('article_list_filtered', ['nameTag' => $request->request->get('tag')]);
    }

    /**
     * @Route("/page/{page}", name="article_list_paginated")
     */
    public function indexPaginated(EntityManagerInterface $entityManager, string $page)
    {
        $articlesPerPage = 4;// changer cette variable pour changer le nb d'articles par page
        $nbArticles = $entityManager->getRepository(Article::class)->count([]);
        $articles = $entityManager->getRepository(Article::class)->findBy([], ['createdAt' => 'DESC'], $articlesPerPage, ($page - 1) * $articlesPerPage);
        if (empty($articles)) {
            $this->get('session')->getFlashBag()->add('warning', 'Cette page n\'existe pas');
            return $this->redirectToRoute('article_list_paginated', ['page' => 1]);
        }

        return $this->render('article/index.html.twig', [
            'articles' => $articles,
            'nb_pages' => ceil($nbArticles / $articlesPerPage),
            'page' => $page,
        ]);
    }


    /**
     * @Route("/blogposts", name="article_add")
     * @throws \Exception
     */
    public function new(Request $request)
    {
        //todo ajouter auth basic
        $article = new Article();
        $article->setTitle('Titre');
        $article->setSubtitle('Sous-titre');
        $article->setCorpus('Ceci est un article passionant !');

        //todo creer la classe qui gere le formulaire ArticleType
        $form = $this->createFormBuilder($article)
            ->add('title', TextType::class, ['label' => 'Titre'])
            ->add('subtitle', TextType::class, ['label' => 'Sous-titre'])
            ->add('corpus', TextareaType::class, ['label' => 'Corps'])
            ->add('tags', EntityType::class, [
                'class' => Tag::class,
                'choice_label' => 'name',
                'multiple' => true,
                'by_reference' => false,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('t')
                        ->andWhere('t.name != :name')
                        ->setParameter('name', 'New')
                        ->orderBy('t.name', 'ASC');
                },
            ])
            ->add('save', SubmitType::class, ['label' => 'Créer l\'article'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $article->setCreatedAt(new \DateTime());

            $entityManager = $this->getDoctrine()->getManager();
            $tag = $this->findOrCreateTag($entityManager, "New");
            $article->addTag($tag);

            $entityManager->persist($article);
            $entityManager->flush();

            $this->get('session')->getFlashBag()->add('notice', 'Article mis en ligne!');

            return $this->redirectToRoute('article_show', ['id' => $article->getId()]);
        }

        return $this->render('article/article_new.html.twig', [
            'form' => $form->createView(),
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
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function show(Article $article, EntityManagerInterface $entityManager)
    {
        $next = $entityManager->getRepository(Article::class)->findNextByDateCreated($article);
        $previous = $entityManager->getRepository(Article::class)->findPreviousByDateCreated($article);
        return $this->render('article/article_detail.html.twig', [
            'article' => $article,
            'previous_id' => $previous != null ? $previous->getId() : null,
            'next_id' => $next != null ? $next->getId() : null,
        ]);
    }

    /**
     * @param ObjectManager $entityManager
     * @param $name string
     * @return Tag|mixed returns the Tag with the name in parameter
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOrCreateTag(ObjectManager $entityManager, string $name)
    {
        $tag = $entityManager->getRepository(Tag::class)->findByNameIgnoreCase($name);
        if ($tag == null) {
            $tag = new Tag("New");
            $entityManager->persist($tag);
        }
        return $tag;
    }
}
