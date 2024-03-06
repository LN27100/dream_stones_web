<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class ProductController extends AbstractController
{
    /**
     * @Route("/products/blue", name="products_by_color_blue")
     */
    public function productsByColorBlue(ProductRepository $productRepository): Response
    {
        $blueStones = $productRepository->findBy(['productColor' => 'bleue']);

        return $this->render('products/productBlue.html.twig', [
            'blueStones' => $blueStones,
        ]);
    }
}
