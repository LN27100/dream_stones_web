<?php

namespace App\Controller;

use App\Entity\Userprofil;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\Persistence\ManagerRegistry;

class AuthentificationController extends AbstractController
{
    private $doctrine;

    // Injecte ManagerRegistry via le constructeur
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Récupére les erreurs d'authentification
        $error = $authenticationUtils->getLastAuthenticationError();
        // Récupére le dernier nom d'utilisateur saisi
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \LogicException('Cette méthode peut être vide - elle sera interceptée par la clé de déconnexion de votre pare-feu.');
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        // Crée une nouvelle instance de l'entité Userprofil
        $user = new Userprofil();
        // Crée le formulaire d'inscription
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encode le mot de passe brut
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $form->get('password')->getData()
            );
            // Défini le mot de passe encodé sur l'utilisateur
            $user->setPassword($hashedPassword);

            // Obtient l'EntityManager à partir de ManagerRegistry
            $entityManager = $this->doctrine->getManager();
            // enregistre l'utilisateur dans la base de données de manière permanente
            $entityManager->persist($user);
            // Exécute les opérations en base de données
            $entityManager->flush();

            // Redirige vers la page de connexion après l'inscription
            return $this->redirectToRoute('app_login');
        }

        // Affiche le formulaire d'inscription
        return $this->render('security/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
