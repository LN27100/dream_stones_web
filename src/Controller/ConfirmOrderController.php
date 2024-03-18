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
        
        // Récupère les données du panier depuis la session
        $session = $request->getSession();
        $cartDataJSON = $session->get('cartData');
        
        // Vérifie si des données de panier sont présentes en session
        if (!$cartDataJSON) {
            // Redirection vers la page du panier ou autre action nécessaire si le panier est vide
            // Exemple : return $this->redirectToRoute('cart');
        }
        
        // Convertit les données JSON en tableau associatif
        $cartData = json_decode($cartDataJSON, true);
        
        // Extrait les éléments du panier
        $cartItems = $cartData['cartItems'];
        $cartTotal = $cartData['cartTotal'];
        
        return $this->render('orders/confirmOrder.html.twig', [
            'cartItems' => $cartItems,
            'cartTotal' => $cartTotal,
        ]);
    }

    // Vérifie si l'utilisateur est connecté
    private function isUserLoggedIn(): bool
    {
        return $this->security->isGranted('IS_AUTHENTICATED_FULLY');
    }
}
