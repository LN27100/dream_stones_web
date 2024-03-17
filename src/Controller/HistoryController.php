<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Orders;
use Doctrine\Persistence\ManagerRegistry; // Importez ManagerRegistry

class HistoryController extends AbstractController
{
    private $doctrine;

    // Injectez ManagerRegistry via le constructeur
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @Route("/history", name="app_history")
     */
    public function index(): Response
    {
        // Récupérer toutes les commandes depuis la base de données
        $orders = $this->doctrine->getRepository(Orders::class)->findAll();

        return $this->render('orders/historyOrder.html.twig', [
            'orders' => $orders,
        ]);
    }
}
