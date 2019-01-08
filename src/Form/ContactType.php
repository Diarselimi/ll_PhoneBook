<?php

namespace App\Form;

use App\Entity\Contact;
use App\Entity\Country;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('street_number')
            ->add('zip')
            ->add('city')
            ->add('phone_number')
            ->add('email')
            ->add('birthday', DateTimeType::class, [
                'widget' => 'single_text',
                'format' => 'dd-MM-yyyy'
            ])
            ->add('picture', FileType::class)
            ->add('country', EntityType::class, [
                'class' => Country::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
