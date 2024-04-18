<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('fullname', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => 2,
                    'maxlength' => 50,
                    'style' => 'width: 400px;',
                ],
                'label' => 'Nom / Prénom',
                'label_attr' => [
                    'class' => 'form-label mt-2',
                ],
            ])
            ->add('email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => 2,
                    'maxlength' => 180,
                    'style' => 'width: 400px;',
                ],
                'label' => 'Email',
                'label_attr' => [
                    'class' => 'form-label mt-2',
                ],
            ])
            ->add('subject', TextType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'minlength' => 2,
                    'maxlength' => 100,
                    'style' => 'width: 400px;',
                ],
                'label' => 'Sujet',
                'label_attr' => [
                    'class' => 'form-label mt-2',
                ],
            ] )
            ->add('message', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'style' => 'width: 400px;',
                ],
                'label' => 'Votre message',
                'label_attr' => [
                    'class' => 'form-label mt-2',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'attr' => ['class' => 'btn2 btn-primary custom-btn mt-4 mb-4'],
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
