<?php
// src/Controller/ShipingInfosController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class ShipingInfosController extends AbstractController
{
    private $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @Route("/shipping_info", name="shipping_info")
     */
    public function shippingInfos(): Response
    {
        // Utilisez $this->translator pour accéder au service TranslatorInterface
        $translatedMessage = $this->translator->trans('Your translated message.');

        return $this->render('conditions/shippingInfos.html.twig', [
            'translatedMessage' => $translatedMessage,
        ]);
    }
}
