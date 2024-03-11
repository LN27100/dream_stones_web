<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuccessOrderController extends AbstractController
{
    /**
     * @Route("/success-order", name="success_order")
     */
    public function successOrder(): Response
    {
        // Affichage de la page de succès de la commande
        return $this->render('orders/SuccessOrder.html.twig');
    }
}
