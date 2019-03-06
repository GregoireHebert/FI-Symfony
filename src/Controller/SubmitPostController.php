<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class SubmitPostController extends AbstractController
{
    public function submit(Request $request)
    {
        $post = new Post();

        $form = $this->createFormBuilder($post)
            ->setMethod('POST')
            ->setAction('/blogposts')
            ->add('title', TextType::class)
            ->add('subtitle', TextType::class)
            ->add('corpus', TextareaType::class)
            ->add('save', SubmitType::class, ['label' => 'Post'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $post = $form->getData();
            $post->setCreatedAt(new \DateTime());
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();
            return $this->redirectToRoute('app_home');
        }
        return $this->render('createPost.html.twig', ['form' => $form->createView(),'etat' => "Bad"]);
    }
}