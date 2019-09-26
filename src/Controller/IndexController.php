<?php
/**
 * Created by PhpStorm.
 * User: starwox
 * Date: 21/09/2019
 * Time: 23:32
 */

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function home(ArticleRepository $articleRepository) {

        $article = $articleRepository->OrderbyNewest();

        if (!$article) {
            throw $this->createNotFoundException(
                'No product found'
            );
        }



        return $this->render('base.html.twig', [
            'controller_name' => 'CategoryController',
            'articles' => $article,
        ]);
    }

    /**
     * @Route("/test")
     */
    public function test() {


        return new Response('<html><body>Starwox </body></html>');
    }
}