<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Userprofil;
use App\Form\UserprofilType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


class ProfilController extends AbstractController
{
    private $doctrine;
    private $tokenStorage;

    // Injecte ManagerRegistry et TokenStorageInterface via le constructeur
    public function __construct(ManagerRegistry $doctrine, TokenStorageInterface $tokenStorage)
    {
        $this->doctrine = $doctrine;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @Route("/profil", name="app_profil")
     */
    public function index(): Response
    {
        // Récupére l'utilisateur connecté depuis la session
        $user = $this->getUser();
        // Vérifie si l'utilisateur est connecté
        if ($user instanceof Userprofil) {
            $form = $this->createForm(UserprofilType::class, $user);
            return $this->render('profil/profil.html.twig', [
                'user' => $user, // Passer l'utilisateur dans modèle Twig
                'form' => $form->createView(), // Passer le formulaire à la vue
            ]);
        } else {
            // Redirige vers la page de connexion si pas connecté
            return $this->redirectToRoute('app_login');
        }
    }

    // MODIFICATION DU PROFIL

    /**
     * @Route("/profil/update", name="app_profile_update")
     */
    public function update(Request $request): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UserprofilType::class, $user);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->doctrine->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('app_profil');
        }

        return $this->render('profil/update.html.twig', [
            'form' => $form->createView(),

        ]);
    }

    // SUPPRESSION DU PROFIL

    /**
     * @Route("/profil/delete", name="app_profile_delete", methods={"GET", "POST", "DELETE"})
     */
    public function delete(Request $request): Response
    {
        $user = $this->getUser();
        if ($user instanceof Userprofil) {
            $entityManager = $this->doctrine->getManager();
            $entityManager->remove($user);
            $entityManager->flush();

            // Invalidates the user's session after deletion
            $this->tokenStorage->setToken(null);

            // Redirect to the homepage after deletion
            return $this->redirectToRoute('app');
        } else {
            // Redirect to the login page if not logged in
            return $this->redirectToRoute('app_login');
        }
    }
}
