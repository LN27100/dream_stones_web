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
        
         // Récupére l'utilisateur connecté depuis la session
         $user = $this->getUser();
         // Récupère toutes les commandes de l'utilisateur connecté depuis la base de données
        $orders = $this->entityManager->getRepository(Orders::class)->findBy(['userprofil' => $user]);
         // Vérifie si l'utilisateur est connecté
         if ($user) {
             return $this->render('orders/historyOrder.html.twig', [
                'orders' => $orders,
            ]);
    
         } else {
             // Redirige vers la page de connexion si pas connecté
             return $this->redirectToRoute('app_login');
         }
    }

    /**
     * @Route("/history/delete/{id}", name="history_delete", methods={"DELETE"})
     */
    public function deleteOrder($id): JsonResponse
    {
        // Charge l'entité Orders à partir de l'ID
        $order = $this->entityManager->getRepository(Orders::class)->find($id);

        // Vérifie si la commande appartient à l'utilisateur connecté
        if ($order && $order->getUserprofil() === $this->getUser()) {
            $entityManager = $this->entityManager;
            $entityManager->remove($order);
            $entityManager->flush();

            return new JsonResponse(['message' => 'Commande supprimée avec succès'], Response::HTTP_OK);
        }

        return new JsonResponse(['error' => 'Impossible de supprimer la commande'], Response::HTTP_BAD_REQUEST);
    }
}
