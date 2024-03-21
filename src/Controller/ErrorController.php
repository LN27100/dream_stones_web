<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    /**
     * @Route("/not-found", name="not_found")
     */
    public function notFound(): Response
    {
        return $this->render('errors/not_found.html.twig');
    }

    /**
     * @Route("/forbidden", name="forbidden")
     */
    public function forbidden(): Response
    {
        return $this->render('errors/forbidden.html.twig');
    }
}
