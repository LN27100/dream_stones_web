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
        $blueStones = $productRepository->findBy(['productColor' => $color]);

        return $this->render('products/productBlue.html.twig', [
            'blueStones' => $blueStones,
        ]);
    }

    /**
     * @Route("/blue-stones", name="blue_stones")
     */
    public function blueStones(ProductRepository $productRepository): Response
    {
        $blueStones = $productRepository->findBy(['productColor' => 'bleue']);

        return $this->render('products/productBlue.html.twig', [
            'blueStones' => $blueStones,
        ]);
    }
}
