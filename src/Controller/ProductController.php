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

    /**
     * @Route("/products/green", name="products_by_color_green")
     */
    public function productsByColorGreen(ProductRepository $productRepository): Response
    {
        $greenStones = $productRepository->findBy(['productColor' => 'verte']);

        return $this->render('products/productGreen.html.twig', [
            'greenStones' => $greenStones,
        ]);
    }

    /**
     * @Route("/products/purple", name="products_by_color_purple")
     */
    public function productsByColorPurple(ProductRepository $productRepository): Response
    {
        $purpleStones = $productRepository->findBy(['productColor' => 'violette']);

        return $this->render('products/productPurple.html.twig', [
            'purpleStones' => $purpleStones,
        ]);
    }

    /**
     * @Route("/products/brown", name="products_by_color_brown")
     */
    public function productsByColorBrown(ProductRepository $productRepository): Response
    {
        $brownStones = $productRepository->findBy(['productColor' => 'marron']);

        return $this->render('products/productBrown.html.twig', [
            'brownStones' => $brownStones,
        ]);
    }

    /**
     * @Route("/products/white", name="products_by_color_white")
     */
    public function productsByColorWhite(ProductRepository $productRepository): Response
    {
        $whiteStones = $productRepository->findBy(['productColor' => 'blanche']);

        return $this->render('products/productWhite.html.twig', [
            'whiteStones' => $whiteStones,
        ]);
    }

    /**
     * @Route("/products/red", name="products_by_color_red")
     */
    public function productsByColorRed(ProductRepository $productRepository): Response
    {
        $redStones = $productRepository->findBy(['productColor' => 'rouge']);

        return $this->render('products/productRed.html.twig', [
            'redStones' => $redStones,
        ]);
    }

    /**
     * @Route("/products/multicolor", name="products_by_color_multicolor")
     */
    public function productsByColorMulticolor(ProductRepository $productRepository): Response
    {
        $multicolorStones = $productRepository->findBy(['productColor' => 'multicolore']);

        return $this->render('products/productMulticolor.html.twig', [
            'multicolorStones' => $multicolorStones,
        ]);
    }


}
