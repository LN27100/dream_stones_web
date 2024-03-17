<?php

namespace App\Controller;

use App\Entity\Userprofil;
use App\Form\RegistrationType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface; // Importez UserPasswordHasherInterface
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Doctrine\Persistence\ManagerRegistry;

class AuthentificationController extends AbstractController
{
    private $doctrine;

    // Injectez ManagerRegistry via le constructeur
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Récupérer les erreurs d'authentification
        $error = $authenticationUtils->getLastAuthenticationError();
        // Récupérer le dernier nom d'utilisateur saisi
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    /**
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        // Cette méthode peut être vide - elle sera interceptée par la clé de déconnexion de votre pare-feu.
        throw new \LogicException('Cette méthode peut être vide - elle sera interceptée par la clé de déconnexion de votre pare-feu.');
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordHasherInterface $passwordHasher): Response
    {
        // Créer une nouvelle instance de l'entité Userprofil
        $user = new Userprofil();
        // Créer le formulaire d'inscription
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Encoder le mot de passe brut
            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $form->get('password')->getData()
            );
            // Définir le mot de passe encodé sur l'utilisateur
            $user->setPassword($hashedPassword);

            // Obtenir l'EntityManager à partir de ManagerRegistry
            $entityManager = $this->doctrine->getManager();
            // Persister l'utilisateur dans la base de données
            $entityManager->persist($user);
            // Exécuter les opérations en base de données
            $entityManager->flush();

            // Rediriger vers la page de connexion après l'inscription
            return $this->redirectToRoute('app_login');
        }

        // Afficher le formulaire d'inscription
        return $this->render('security/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
