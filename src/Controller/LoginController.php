<?php

namespace App\Controller;

use App\Repository\UserprofilRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class LoginController extends AbstractController
{
    private $userRepository;
    private $passwordHasher;

    public function __construct(UserprofilRepository $userRepository, UserPasswordHasherInterface $passwordHasher)
    {
        $this->userRepository = $userRepository;
        $this->passwordHasher = $passwordHasher;
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        // Si l'utilisateur est déjà connecté, le rediriger vers la page d'accueil
        if ($this->getUser()) {
            return $this->redirectToRoute('app');
        }

        // Récupérer l'erreur de connexion s'il y en a une
        $error = $authenticationUtils->getLastAuthenticationError();

        // Dernier email saisi par l'utilisateur
        $lastEmail = $authenticationUtils->getLastUsername();

        // Si le formulaire de connexion a été soumis
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $password = $request->request->get('password');

            // Rechercher l'utilisateur dans la base de données
            $user = $this->userRepository->loadUserByUsername($email);

            // Vérifier si l'utilisateur existe et si le mot de passe est correct
            if (!$user || !$this->passwordHasher->isPasswordValid($user, $password)) {
                // Si l'utilisateur n'existe pas ou si le mot de passe est incorrect, renvoyer un message générique
                throw new BadCredentialsException('Identifiants incorrects');
            }

            // Si la vérification réussit, connectez l'utilisateur
            // Ajoutez votre logique de connexion ici

            return $this->redirectToRoute('app'); // Redirigez l'utilisateur après la connexion
        }

        return $this->render('login/login.html.twig', [
            'last_email' => $lastEmail,
            'error'      => $error,
        ]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout()
    {
        // Controller vide, c'est géré par Symfony
    }
}
