<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserAdminFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label'         => 'L\'email',
                'label_attr'    => [
                    'class'         => 'form__label'
                ],
                'attr'          => [
                    'placeholder'   => ' Votre email', 
                    'class'         => 'form__field'
                ]
            ])
            // ->add('roles')
            ->add('lastname', TextType::class, [
                'label'         => 'Le nom',
                'label_attr'    => [
                    'class'         => 'form__label'
                ],
                'required'      => true,
                'attr'          => [
                    'placeholder'   => ' Votre nom',
                    'class'         => 'form__field'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label'         => 'Le prénom',
                'label_attr'    => [
                    'class'         => 'form__label'
                ],
                'required'      => true,
                'attr'          => [
                    'placeholder'   => ' Votre nom',
                    'class'         => 'form__field'
                ]
            ])
            ->add('enable', CheckboxType::class, [
                'label'         => 'Actif',
                'label_attr'    => [
                    'class'         => 'form__label'
                ],
                'required'      => true,
                'attr'          => [
                    'placeholder'   => ' Votre nom',
                    'class'         => 'form__field mt-2',
                    'role'          => 'switch',
                    'style'         => '--bg-checked: rgb(50,240,130)'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label'         => 'Sauvegarder',
                'attr'          => [
                    'class'         => 'btn btn-success mt-2 mb-2'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
