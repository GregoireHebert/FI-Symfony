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


class ProductController extends AbstractController
{
    public function __invoke()
    {
        $product = new Product();
        $form = $this->createForm(ArticleFormType::class,$product);
        
        return $this->render(
            'new.html.twig',
            ['articleForm' => $form->createView(),
            'msg' => '']
        );
    }
}

?>