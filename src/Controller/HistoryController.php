<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Orders;

class HistoryController extends AbstractController
{
    /**
     * @Route("/history", name="app_history")
     */
    public function index(): Response
    {
        // Récupérer toutes les commandes depuis la base de données
        $orders = $this->getDoctrine()->getRepository(Orders::class)->findAll(); // Correction du nom de l'entité

        return $this->render('orders/historyOrder.html.twig', [
            'orders' => $orders,
        ]);
    }
}
