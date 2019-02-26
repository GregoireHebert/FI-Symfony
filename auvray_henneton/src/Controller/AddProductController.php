<?php
declare (strict_types = 1);

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use App\Entity\Product;
use App\Form\ArticleFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AddProductController extends AbstractController{
    public function __invoke(Request $request,EntityManagerInterface $em){

        $product = new Product();

        $form = $this->createForm(ArticleFormType::class,$product);
        
        $msg ='';
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $product = $form->getData();
            $product->setCreatedAt(new \DateTime());
            $em->persist($product);
            $em->flush();
            $msg="New post added on the blog :)";

        } else {
            $msg = "There are mistakes in the form :(";

        }

        return $this->render('new.html.twig', [
            'articleForm' => $form->createView(),
            'msg' => $msg
        ]);

    }

  
}

?>