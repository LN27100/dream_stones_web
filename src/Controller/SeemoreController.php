<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\ProductImage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SeemoreController extends AbstractController
{
    /**
     * @Route("/seemore/{id}", name="app_seemore")
     */
    public function index($id): Response
    {
        // Récupérer le produit et ses images depuis la base de données
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->findOneBy(['id' => $id]);

        if (!$product) {
            throw $this->createNotFoundException('Le produit avec l\'ID ' . $id . ' n\'existe pas.');
        }

        // Récupérer les images associées au produit
        $images = $entityManager->getRepository(ProductImage::class)->findBy(['product' => $product]);

        return $this->render('seemore/seemore.html.twig', [
            'product' => $product,
            'images' => $images,
        ]);
    }
}
