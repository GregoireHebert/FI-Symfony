<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
        /**
         * @Route("/", name="homepage")
         */
        public function index()
        {
            $repository = $this->getDoctrine()->getRepository(Article::class);
            $articles = $repository->findAll();

            return $this->render('base.html.twig', ['articles' => $articles]);
        }
}
