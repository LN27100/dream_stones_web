<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StonesUseController extends AbstractController
{
    /**
     * @Route("/stones_use", name="stones_use")
     */
    public function stonesUse(): Response
    {
        return $this->render('conditions/stonesUse.html.twig');
    }
}
