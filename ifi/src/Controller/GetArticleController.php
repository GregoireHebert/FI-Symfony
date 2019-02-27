<?php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Article;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GetArticleController extends Controller
{
        /**
         * @Route("/{id}", methods={"GET"}, name="getArticle")
         */
        public function __invoke(Request $request)
        {
            $repository = $this->getDoctrine()->getRepository(Article::class);
            $articleId = $request->get('id');
            $article = $repository->find($articleId);

            return $this->render('article.html.twig', ['article' => $article]);
        }
}
