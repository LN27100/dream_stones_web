<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    /**
     * @Route("/products/{color}", name="products_by_color")
     */
    public function productsByColor($color, ProductRepository $productRepository): Response
    {
        // Récupérer les produits par couleur
        $products = $productRepository->findBy(['productColor' => $color]);

      
        // Passer les données à la vue Twig
        return $this->render('product/products_by_color.html.twig', [
            'products' => $products,
        ]);
    }
}
