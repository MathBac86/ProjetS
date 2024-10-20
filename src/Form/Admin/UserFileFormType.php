<?php

namespace App\Form\Admin;

use App\Entity\Files;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Validator\Constraints as Assert;

class UserFileFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('file', VichImageType::class, [
                'required'     => false,
                'label'        => 'Choix de l\'image',
                'label_attr'   => [
                    'class'        => 'btn btn-tertiary js-labelFile'
                ],
                'allow_delete' => true,
                'download_uri' => true,
                'image_uri'    => true,
                'help'         => 'Taille maximale : 32Mo',
                'help_attr'    => [
                    'class'         =>  'form-text'
                ],
                'delete_label' => 'Supprimer',
                'attr'         => [
                    'accept' => 'image/*',
                    'class'  => 'input-file'
                ],
                'constraints'  => [
                    new Assert\Image(),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Files::class,
        ]);
    }
}
