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
use Symfony\Component\HttpClient\HttpClient;


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
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        // Si l'utilisateur est déjà authentifié, redirige vers la page de profil
        if ($this->getUser()) {
            return $this->redirectToRoute('app_profil');
        }

        // Récupére les erreurs d'authentification
        $error = $authenticationUtils->getLastAuthenticationError();
        // Récupére le dernier nom d'utilisateur saisi
        $lastUsername = $authenticationUtils->getLastUsername();

        // Vérifier le reCaptcha seulement si le formulaire est soumis
        if ($request->isMethod('POST')) {
            // Récupérer la réponse du reCaptcha
            $recaptchaResponse = $request->request->get('g-recaptcha-response');

            // Vérifier la réponse
            $client = HttpClient::create();
            $response = $client->request('POST', 'https://www.google.com/recaptcha/api/siteverify', [
                'body' => [
                    'secret' => '6Lc3HZ4pAAAAAC_ny_ou2thqFQ8SF192EuIf13w3',
                    'response' => $recaptchaResponse,
                ],
            ]);

            $responseData = $response->toArray();

            if (!$responseData['success']) {
                // Le reCaptcha n'est pas validé
                return $this->render('security/login.html.twig', [
                    'last_username' => $lastUsername,
                    'error' => 'reCaptcha obligatoire', // Message d'erreur
                ]);
            }
        }

        // Affiche la page de connexion avec les erreurs éventuelles
        return $this->render('security/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
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
