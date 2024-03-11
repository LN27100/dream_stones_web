<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ConfirmOrderController extends AbstractController
{
    // Injecte le service Security Symfony
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }

    /**
     * @Route("/confirm-order", name="confirm_order")
     */
    public function confirmOrder(Request $request): Response
    {
        // Vérifie si l'utilisateur est connecté
        if (!$this->isUserLoggedIn()) {
            return $this->redirectToRoute('app_login');
        }
        
        // Récupére les données du panier depuis la session
        $session = $request->getSession();
        $cartItems = $session->get('cartItems');
        
        return $this->render('orders/confirmOrder.html.twig', [
            'cartItems' => $cartItems,
        ]);
    }

    // Vérifie si l'utilisateur est connecté
    private function isUserLoggedIn(): bool
    {
        return $this->security->isGranted('IS_AUTHENTICATED_FULLY');
    }
}
