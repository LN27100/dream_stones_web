<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry; 

class SeemoreController extends AbstractController
{
    private $doctrine;

    // Injectez ManagerRegistry via le constructeur
    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    /**
     * @Route("/seemore/{id}", name="app_seemore")
     */
    public function index(Request $request, $id): Response
    {
        // Récupérer le produit depuis la base de données en utilisant l'ID
        $product = $this->doctrine->getRepository(Product::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException('Le produit avec l\'ID ' . $id . ' n\'existe pas.');
        }

        return $this->render('seemore/seemore.html.twig', [
            'product' => $product,
        ]);
    }
}
