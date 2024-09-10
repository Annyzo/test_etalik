<?php

namespace App\Form;

use App\Entity\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du formulaire',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Saisissez le nom du formulaire'
                ]
            ])
            ->add('fields', CollectionType::class, [
                'entry_type' => FieldType::class, 
                'label' => 'Champs du formulaire',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'attr' => ['class' => 'form-control dynamic-collection'], 
                'prototype' => true, 
                'entry_options' => [
                    'label' => false,
                    'attr' => ['class' => 'form-control mb-2']
                ]
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer le formulaire',
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Form::class,
        ]);
    }
}
