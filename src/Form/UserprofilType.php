<?php

namespace App\Form;

use App\Entity\Userprofil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType; // Import TelType for phone field
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserprofilType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class)
            ->add('name', TextType::class)
            ->add('firstname', TextType::class)
            ->add('phone', TelType::class) // Add phone field using TelType
            ->add('streetName', TextType::class)
            ->add('additionalAddress', TextType::class)
            ->add('zipcode', TextType::class)
            ->add('city', TextType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Userprofil::class,
        ]);
    }
}
