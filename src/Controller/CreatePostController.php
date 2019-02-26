<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Post;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CreatePostController extends AbstractController
{
    public function create()
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

        return $this->render('createPost.html.twig', [
            'form' => $form->createView(),
            'etat' => "Neutre"
        ]);
    }
}