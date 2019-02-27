<?php

namespace App\Controller;

use App\Entity\BlogPost;
use function Sodium\add;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Article;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;





class BlogController extends Controller{

    /**
     * @Route("/",name="homepage")
     * @Method({"GET"})
     */

    public function  index(){
        //return new Response('<html><body>Hello Home page</body></html>');
           $articles =['Article1','Article2', 'Articles3'];

           $articles= $this->getDoctrine()->getRepository(BlogPost::class)->findAll();
           return $this->render('blog/index.html.twig', array('articles'=> $articles));
    }


    /*
    /**
     * @Route("/blogPost/save")
     */

 /*   public  function  save(){

        $entityManager = $this->getDoctrine()->getManager();
        $article = new BlogPost();
        $article->setName('auteur1');
        $article->setTitle('Premier Article');
        $article->setSubtitle('article-1');
        $article->setCorpus('le contenu du premier article');
        $article->setCreatedAt('2014-08-25 22:37');

        $entityManager->persist($article);
        $entityManager->flush();


        return new Response('enregister cet article avec Id '.$article->getId());

    }
*/

    /**
     *@Route("/blogPost/create",name="create")
     * Method({"GET","POST"})
     */
    public function createAction(Request $request) {

       $article = new  BlogPost();
       $form = $this->createFormBuilder($article)
            ->add('title',TextType::class, array('attr' =>
               array('class' => 'form-control')))
            ->add('subtitle',TextType::class, array('attr' =>
               array('class' => 'form-control')))
            ->add('corpus', TextareaType::class, array(
                'required'=>false,
                'attr' => array('class' => 'form-control')))
            ->add('createdAt',DateTimeType::class, array('attr' =>
                array('class' => 'form-control')))
            ->add('Ajouter', SubmitType::class, array(
                'label' => 'Create',
                'attr' =>array('class' => 'btn-btn-primary mt-3')
            ))
           ->getForm();

       $form->handleRequest($request);

       if($form->isSubmitted()&& $form->isValid()){
           $article = $form->getData();

           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($article);
           $entityManager->flush();

            return $this->redirectToRoute('homepage');
       }

        return $this->render('blog/create-article.html.twig', array(
            'form' =>$form->createView()
        ));

        //return new Response('<html><body> page de creation d\'un article </body></html>');
    }

}
