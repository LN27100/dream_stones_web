<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// DefaultController hérite des fonctionnalités de AbstractController
class DefaultController extends AbstractController
{
    /**
     * @Route("/app", name="app")
     */

    //  Déclare la méthode qui est l'action associée à la route
    public function app(): Response
    {
        //  renvoie une réponse HTTP contenant le contenu généré à partir du template 
        return $this->render('app.html.twig');
    }
}
