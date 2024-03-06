<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Userprofil;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="app_profil")
     */
    public function index(): Response
    {
        // Récupérer l'utilisateur connecté depuis la session ou une autre source
        $user = $this->getUser(); // Cette méthode peut varier en fonction de la configuration de votre application
        
        // Vérifier si l'utilisateur est connecté
        if ($user instanceof Userprofil) {
            return $this->render('profil/profil.html.twig', [
                'user' => $user, // Passer l'utilisateur à votre modèle Twig
            ]);
        } else {
            // Gérer le cas où l'utilisateur n'est pas connecté
            // Rediriger vers la page de connexion par exemple
            return $this->redirectToRoute('app_login');
        }
    }
}
