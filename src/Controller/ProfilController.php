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
        // Récupérer l'utilisateur connecté depuis la session ou une autre source
        $user = $this->getUser();
        // Vérifier si l'utilisateur est connecté
        if ($user instanceof Userprofil) {
            $form = $this->createForm(UserprofilType::class, $user);
            return $this->render('profil/profil.html.twig', [
                'user' => $user, // Passer l'utilisateur à votre modèle Twig
                'form' => $form->createView(), // Passer le formulaire à la vue
            ]);
        } else {
            // Gérer le cas où l'utilisateur n'est pas connecté
            // Rediriger vers la page de connexion par exemple
            return $this->redirectToRoute('app_login');
        }
    }

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
}
