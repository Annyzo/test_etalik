<?php

namespace App\Form;

use App\Entity\Field;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\TypeDefinition\FieldType as Options;

class FieldType extends AbstractType
{
    public const options = [Options::Text->name, Options::Textarea->name,  Options::Number->name, Options::Date->name, Options::Select->name, Options::Boolean->name, Options::Email->name];

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('label', null, ['label' => false, 'attr' => ['placeholder' => 'Label']])
            ->add('type', ChoiceType::class, [
                'label' => false,
                'attr' => ['class' => 'field-type-selection'],
                'placeholder' => 'Type',
                'choices' => [
                    Options::Date->name => Options::Date->value,
                    Options::Number->name => Options::Number->value,
                    Options::Text->name => Options::Text->value,
                    Options::Textarea->name => Options::Textarea->value,
                    Options::Email->name => Options::Email->value
                   ,
                ]
            ])
            ->add('fieldAttributes', FieldAttributesType::class, ['label' => 'Attributs du champ', 'row_attr' => ['class' => 'attributes-row']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Field::class,
        ]);
    }
}
