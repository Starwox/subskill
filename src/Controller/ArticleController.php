<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article/create/{id}", name="article")
     */
    public function index(ValidatorInterface $validator, $id)
    {

        $em = $this->getDoctrine()->getManager();

        $category = $this->getDoctrine()->getRepository(Category::class)->find($id);

        $article = new Article();
        $article->setTitle('Macbook Pro');
        $article->setImage('/img/macbook.jpg');
        $article->setDescription('Ordinateur portable');
        $article->setDate(new \DateTime());
        $article->setCategory($category);

        $em->persist($article);
        $em->flush();

        $errors = $validator->validate($article);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        return new Response('it\' ok');
    }

    /**
     * @Route("/article/find/{id}", name="get_category")
     */
    public function getCategoryByID($id) {
        $category = $this->getDoctrine()->getRepository(Article::class)->find($id);

        if (!$category) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great category: '.$category->getTitle());
    }

    /**
     * @Route("/article/bdd", name="get_all_category")
     */
    public function getAllCategory() {
        $article = $this->getDoctrine()->getRepository(Article::class)->findAll();

        if (!$article) {
            throw $this->createNotFoundException(
                'No product found'
            );
        }


        return new Response('Check out this great category: '.$article);
    }


    /**
     * @Route("/article/details/{id}", name="article_details")
     */
    public function getDetails($id) {

        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);


        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'article'   => $article,
        ]);
    }

    /**
     * @Route("/article/edit/{id}", name="article_edit")
     */
    public function editArticles($id) {


        $em = $this->getDoctrine()->getManager();
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);

        $article->setImage('/img/macbook.jpg');
        $em->persist($article);
        $em->flush();

        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'article'   => $article,
        ]);
    }

}
