<?php

namespace App\Controller;

use App\Entity\Order;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProcessOrderController extends AbstractController
{
    /**
     * @Route("/process-order", name="process_order", methods={"POST"})
     */
    public function processOrder(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer les données de la commande depuis la requête
        $shipping = $request->request->get('shipping'); 
        $paymentMode = $request->request->get('payment_mode'); 
        $deleteArticle = $request->request->get('delete_article'); 
        $newPrice = $request->request->get('new_price'); 
        $status = $request->request->get('status'); 
        $shippingFees = $request->request->get('shipping_fees'); 
        $cancellation = $request->request->get('cancellation'); 
        $totalPrice = $request->request->get('total_price'); 
        $totalQuantity = $request->request->get('total_quantity'); 
        $ref = $request->request->get('ref'); 
        $date = new \DateTime(); // La date actuelle
        $quantity = $request->request->get('quantity'); 
        $userProfileId = $this->getUser()->getId(); 
        
        // Créer une nouvelle instance de l'entité Orders
        $order = new Order();
        $order->setShipping($shipping);
        $order->setPaymentMode($paymentMode);
        $order->setDeleteArticle($deleteArticle);
        $order->setNewPrice($newPrice);
        $order->setStatus($status);
        $order->setShippingFees($shippingFees);
        $order->setCancellation($cancellation);
        $order->setTotalPrice($totalPrice);
        $order->setTotalQuantity($totalQuantity);
        $order->setRef($ref);
        $order->setDate($date);
        $order->setQuantity($quantity);
        $order->setUserProfileId($userProfileId);
        
        // Enregistrer la commande dans la base de données
        $entityManager->persist($order);
        $entityManager->flush();

        // Rediriger l'utilisateur vers une page de confirmation
        return $this->redirectToRoute('order_confirmation');
    }
}
