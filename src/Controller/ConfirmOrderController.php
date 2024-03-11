<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class ConfirmOrderController extends AbstractController
{
    // Injectez le service Security dans le contrôleur
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
        // Vérifiez si l'utilisateur est connecté
        if (!$this->isUserLoggedIn()) {
            // Redirigez l'utilisateur vers la page de connexion
            return $this->redirectToRoute('app_login');
        }
        
        // Récupérer les données du panier depuis la session
        $session = $request->getSession();
        $cartItems = $session->get('cartItems');
        
        // Vous pouvez maintenant passer ces données à votre vue confirmOrder.html.twig
        return $this->render('orders/confirmOrder.html.twig', [
            'cartItems' => $cartItems,
        ]);
    }

    // Fonction pour vérifier si l'utilisateur est connecté
    private function isUserLoggedIn(): bool
    {
        // Vérifiez si l'utilisateur est authentifié
        return $this->security->isGranted('IS_AUTHENTICATED_FULLY');
    }
}
