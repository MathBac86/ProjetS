<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre email',
                'label_attr' => [
                    'class' => 'form__label ms-1'
                ],
                'attr' => [
                    'placeholder' => ' Votre email', 
                    'class' => 'form__field'
                ]
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'label' => 'Acceptation des termes ',
                'label_attr' => [
                    'class' => 'ms-1'
                ],
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les termes.',
                    ]),
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Votre nom',
                'label_attr' => [
                    'class' => 'form__label ms-1'
                ],
                'required' => true,
                'attr' => [
                    'placeholder' => ' Votre nom',
                    'class' => 'form__field'
                ]
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Votre prénom',
                'label_attr' => [
                    'class' => 'form__label ms-1'
                ],
                'required' => true,
                'attr' => [
                    'placeholder' => ' Votre prénom',
                    'class' => 'form__field'
                ]
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label' => 'Votre mot de passe : ',
                'label_attr' => [
                    'class' => 'form__label ms-1'
                ],
                'mapped' => false,
                'attr' => [
                    'autocomplete' => 'new-password',
                    'placeholder' => ' Votre mot de passe',
                    'class' => 'form__field'
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Merci, d\'entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'M\'inscrire',
                'attr' => [
                    'class' => 'btn btn-success mt-2 mb-2'
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
