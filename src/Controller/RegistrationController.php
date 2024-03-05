<?php

namespace App\Controller;

use App\Entity\Userprofil;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @Route("/inscription", name="inscription")
     */
    public function register(Request $request): Response
    {
        $user = new Userprofil();
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encoder le mot de passe
            $user->setPassword(
                // Utilisez l'encodeur de mot de passe approprié (bcrypt, argon2i, etc.)
                // par exemple, si vous utilisez le composant Security de Symfony
                $this->passwordEncoder->encodePassword(
                    $user,
                    $form->get('userprofil_password')->getData()
                )
            );

            // Enregistrez l'utilisateur dans la base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('inscription_success');
        }

        return $this->render('registration/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/inscription/success", name="inscription_success")
     */
    public function registrationSuccess(): Response
    {
        return $this->render('registration/success.html.twig');
    }
}
