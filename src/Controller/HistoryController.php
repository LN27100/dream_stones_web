<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface; 
use App\Entity\Orders;

class HistoryController extends AbstractController
{
    private $entityManager;

    // Injecte EntityManagerInterface via le constructeur
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/history", name="app_history")
     */
    public function index(): Response
    {
        // Récupére toutes les commandes depuis la base de données
        $orders = $this->entityManager->getRepository(Orders::class)->findAll();

        return $this->render('orders/historyOrder.html.twig', [
            'orders' => $orders,
        ]);
    }

    /**
     * @Route("/history/delete/{id}", name="history_delete", methods={"DELETE"})
     */
    public function deleteOrder($id): JsonResponse
    {
        // Charge l'entité Orders à partir de l'ID
        $order = $this->entityManager->getRepository(Orders::class)->find($id);

        // Vérifie si la commande est en attente de validation
        if ($order && $order->getStatus() === 'en attente de validation') {
            $entityManager = $this->entityManager;
            $entityManager->remove($order);
            $entityManager->flush();

            return new JsonResponse(['message' => 'Commande supprimée avec succès'], Response::HTTP_OK);
        }

        return new JsonResponse(['error' => 'Impossible de supprimer la commande'], Response::HTTP_BAD_REQUEST);
    }
}
