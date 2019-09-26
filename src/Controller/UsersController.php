<?php

namespace App\Controller;

use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    /**
     * @Route("/users/create", name="users_create")
     */
    public function sendMail(Request $request)
    {

        $user = new Users();
        $form = $this->createFormBuilder($user)
            ->add('civility', ChoiceType::class, [
                'choices' => [
                    'Mme' => 'Mme',
                    'M' => 'M'
                ],
                'expanded' => true,
                'multiple' => false,
                'attr' => [
                    'class' => 'form-check-input'
                ]
            ])
            ->add('last_name', TextType::class, [
                'empty_data' => 'Nom',
                'attr' => [
                    'class' => 'col-sm-2 col-form-label'
                ]
            ])
            ->add('first_name', TextType::class, [
                'empty_data' => 'Prénom',
                'attr' => [
                    'class' => 'col-sm-2 col-form-label'
                ]
            ])
            ->add('email', TextType::class, [
                'empty_data' => 'Email',
                'attr' => [
                    'class' => 'col-sm-2 col-form-label'
                ]
                ])
            ->add('object', ChoiceType::class, [
                'choices' => [
                    'Recrutement' => 'Recrutement',
                    'Support' => 'Support',
                    'Marketing' => 'Marketing'
                ],
                'attr' => [
                    'class' => 'form-control'
                ]
            ])
            ->add('message', TextType::class, [
                'empty_data' => 'Message',
                'attr' => [
                    'class' => 'col-sm-2 col-form-label'
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Valider',
                'attr' => [
                    'class' => 'btn btn-primary'
                ]
            ])
            ->getForm();


        if ($form->isSubmitted() && $form->isValid()) {
            dump("test");
        }
        return $this->render('users/index.html.twig', [
            'controller_name' => 'UsersController',
            'form' => $form->createView(),
        ]);
    }
}
