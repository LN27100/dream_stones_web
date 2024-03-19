<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalMentionsController extends AbstractController
{
    /**
     * @Route("/mention_legal", name="mention_legal")
     */
    public function legalMentions(): Response
    {
        return $this->render('conditions/legalMentions.html.twig');
    }
}
