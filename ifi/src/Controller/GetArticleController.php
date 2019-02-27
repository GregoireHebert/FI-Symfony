<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class GetArticleController extends Controller
{
        /**
         * @Route("/get/{id}", methods={"GET"}, name="getArticle")
         */
        public function __invoke(Request $request)
        {
            $repository = $this->getDoctrine()->getRepository(Article::class);
            $articleId = $request->get('id');
            $article = $repository->find($articleId);

            return $this->render('article.html.twig', ['article' => $article]);
        }
}
