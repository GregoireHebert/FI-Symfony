<?php

namespace Afrass\TagBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{

    /**
     * @Route("/tags.json",name="tag.index")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexAction(Request $request){
        $tagRepository = $this->getDoctrine()->getRepository('TagBundle:Tag');
        $tags = $tagRepository->findAll();
        //afficher que les champs qui appartiens au groupe public
        return $this->json($tags,200,[],['groups' => ['public']]);
    }

}
