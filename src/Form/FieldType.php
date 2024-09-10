<?php

namespace App\Form;

use App\Entity\Field;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FieldType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label', TextType::class, [
                'label' => 'Étiquette du champ',
                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Saisissez le label du champ'
                ]
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type de champ',
                'choices' => [
                    'Texte' => 'text',
                    'Nombre' => 'number',
                    'Date' => 'date',
                ],
                'attr' => [
                    'class' => 'form-select' 
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
     
            $resolver->setDefaults([
                'data_class' => Field::class,
            ]);
        
    }
}
