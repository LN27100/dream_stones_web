<?php

namespace App\Form;

use App\Entity\Userprofil;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType; // Ajout de cette ligne

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('userprofil_name', TextType::class, [
                'label' => 'Nom',
            ])
            ->add('userprofil_firstname', TextType::class, [
                'label' => 'Prénom',
            ])
            // Ajoutez d'autres champs de formulaire pour les attributs de votre entité Userprofil
            ->add('userprofil_mail', EmailType::class, [
                'label' => 'Email',
            ])
            ->add('userprofil_password', PasswordType::class, [
                'label' => 'Mot de passe',
            ])
            ->add('conf_mot_de_passe', PasswordType::class, [
                'label' => 'Confirmer Mot de passe',
            ])
            ->add('cgu', CheckboxType::class, [
                'label' => 'J\'accepte les conditions d\'utilisation',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'S\'enregistrer',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Userprofil::class,
        ]);
    }
}
