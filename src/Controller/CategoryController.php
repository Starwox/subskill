<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{title}", name="category")
     */
    public function index(ValidatorInterface $validator, $title)
    {

        $em = $this->getDoctrine()->getManager();

        $category = new Category();
        $category->setTitle($title);

        $em->persist($category);
        $em->flush();

        $errors = $validator->validate($category);
        if (count($errors) > 0) {
            return new Response((string) $errors, 400);
        }

        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'title_category' => $category->getTitle(),
        ]);
    }

    /**
     * @Route("/category/{id}", name="get_category")
     */
    public function getCategoryByID($id) {
        $category = $this->getDoctrine()->getRepository(Category::class)->find($id);

        if (!$category) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        return new Response('Check out this great category: '.$category->getTitle());
    }
}
