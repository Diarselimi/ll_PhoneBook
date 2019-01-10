<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Country;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('street_number', TextType::class, [
                'label' => 'Street name and number'
            ])
            ->add('zip')
            ->add('city')
            ->add('country', EntityType::class, [
                'class' => Country::class,
                'placeholder' => 'select a country',
                'choice_attr' => function($choiceVal, $key, $val) {
                    return ['data-country_code' => $choiceVal->getCode()];
                }
            ])
            ->add('phone_number')
            ->add('email')
            ->add('birthday', DateType::class, [
                'widget' => 'single_text',
                'attr' => [
                    'type' => 'date'
                ]
            ])
            ->add('picture', FileType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
