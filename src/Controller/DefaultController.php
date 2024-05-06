<?php

namespace App\Controller;

use Symfony\Component\Security\Core\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/app", name="app")
     */
    public function app(Security $security): Response
    {
        // Vérifie si l'utilisateur est connecté
        $user = $security->getUser();
        
        // Passez cette information au template Twig
        return $this->render('app.html.twig', [
            'user' => $user,
        ]);
    }
}