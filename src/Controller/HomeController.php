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
        
        if($request->get('sorted')=='true'){
            $repository = $em->createQuery(
                'SELECT p.id,p.title,p.corpus,p.subtitle,p.createdAt,p.tags
                FROM App\Entity\Article p order by p.createdAt ASC'
            )->execute();            
        }else{
            $repository = $em->createQuery(
                'SELECT p.id,p.title,p.corpus,p.subtitle,p.createdAt,p.tags
                FROM App\Entity\Article p'
            )->execute(); 
        }
        $tag = $request->get('tag');
        $array = [];
        if($tag!=NULL){
            foreach( $repository as $art){
                foreach( $art["tags"] as $lesTags){
                    if($lesTags->name == $tag){
                        array_push($array,$art);
                    }
                }
            }
        }else{
            $array = $repository;
        }
        return $this->render('base.html.twig',['articles' => $array]);
    }


}