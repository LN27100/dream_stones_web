<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Userprofil;
use App\Form\UserprofilType;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="app_profil")
     */
    public function index(): Response
    {
        // Récupérer l'utilisateur connecté depuis la session
        $user = $this->getUser();
        // Vérifie si l'utilisateur est connecté
        if ($user instanceof Userprofil) {
            $form = $this->createForm(UserprofilType::class, $user);
            return $this->render('profil/profil.html.twig', [
                'user' => $user, // Passer l'utilisateur dans modèle Twig
                'form' => $form->createView(), // Passer le formulaire à la vue
            ]);
        } else {
            // Rediriger vers la page de connexion si pas connecté
            return $this->redirectToRoute('app_login');
        }
    }

    // Modification du profil

    /**
     * @Route("/profil/update", name="app_profile_update")
     */
    public function update(Request $request): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UserprofilType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('app_profil');
        }

        return $this->render('profil/update.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // Suppression du profil
    
     /**
     * @Route("/profil/delete", name="app_profile_delete", methods={"DELETE"})
     */
    public function delete(Request $request): Response
    {
        $user = $this->getUser();
        if ($user instanceof Userprofil) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
            
            // Rediriger vers une page d'accueil après la suppression
            return $this->redirectToRoute('home');
        } else {
            // Rediriger vers la page de connexion si pas connecté
            return $this->redirectToRoute('app_login');
        }
    }
}
