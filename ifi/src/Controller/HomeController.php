<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;


class HomeController extends AbstractController
{
        /**
         * @Route("/", name="homepage")
         */
        public function index(Request $request, PaginatorInterface $paginator)
        {
            $repository = $this->getDoctrine()->getRepository(Article::class);
            $articles = $paginator->paginate(
                $articles = $repository->findBy([], ['id' => 'DESC']),
                $request->query->getInt('page', 1),
                3
            );


            return $this->render('base.html.twig', ['articles' => $articles]);
        }
}
