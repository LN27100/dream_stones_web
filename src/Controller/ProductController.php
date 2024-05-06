<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends AbstractController
{

    // RECUPERATION DES PIERRES PAR COULEURS

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

    /**
     * @Route("/products/black", name="products_by_color_black")
     */
    public function productsByColorBlack(ProductRepository $productRepository): Response
    {
        $blackStones = $productRepository->findBy(['productColor' => 'noire']);

        return $this->render('products/productBlack.html.twig', [
            'blackStones' => $blackStones,
        ]);
    }

    /**
     * @Route("/products/yellow", name="products_by_color_yellow")
     */
    public function productsByColorYellow(ProductRepository $productRepository): Response
    {
        $yellowStones = $productRepository->findBy(['productColor' => 'jaune']);

        return $this->render('products/productYellow.html.twig', [
            'yellowStones' => $yellowStones,
        ]);
    }

    /**
     * @Route("/products/grey", name="products_by_color_grey")
     */
    public function productsByColorGrey(ProductRepository $productRepository): Response
    {
        $greyStones = $productRepository->findBy(['productColor' => 'grise']);

        return $this->render('products/productGrey.html.twig', [
            'greyStones' => $greyStones,
        ]);
    }

    /**
     * @Route("/products/orange", name="products_by_color_orange")
     */
    public function productsByColorOrange(ProductRepository $productRepository): Response
    {
        $orangeStones = $productRepository->findBy(['productColor' => 'orange']);

        return $this->render('products/productOrange.html.twig', [
            'orangeStones' => $orangeStones,
        ]);
    }

       /**
     * @Route("/products/pink", name="products_by_color_pink")
     */
    public function productsByColorPink(ProductRepository $productRepository): Response
    {
        $pinkStones = $productRepository->findBy(['productColor' => 'rose']);

        return $this->render('products/productPink.html.twig', [
            'pinkStones' => $pinkStones,
        ]);
    }

   // RECUPERATION DES PIERRES PAR CATEGORIES

    /**
     * @Route("/products/category/pierres-roulees", name="products_by_category_rolled_stones")
     */
    public function productsByRolledStones(ProductRepository $productRepository): Response
    {
        // Récupérer les produits par catégorie "pierres roulées"
        $rolledStones = $productRepository->findByCategory('pierres roulées');

        return $this->render('products/productRolledStones.html.twig', [
            'rolledStones' => $rolledStones,
        ]);
    }

    /**
     * @Route("/products/category/pierres-brutes", name="products_by_category_raw_stones")
     */
    public function productsByRawStones(ProductRepository $productRepository): Response
    {
        // Récupérer les produits par catégorie "pierres brutes"
        $rawStones = $productRepository->findByCategory('pierres brutes');

        return $this->render('products/productRawStones.html.twig', [
            'rawStones' => $rawStones,
        ]);
    }

    /**
     * @Route("/products/category/bijoux", name="products_by_category_jewelry")
     */
    public function productsByJewelry(ProductRepository $productRepository): Response
    {
        // Récupérer les produits par catégorie "bijoux"
        $jewelryStones = $productRepository->findByCategory('bijoux');

        return $this->render('products/productJewelry.html.twig', [
            'jewelryStones' => $jewelryStones,
        ]);
    }

    /**
     * @Route("/products/category/geodes", name="products_by_category_geodes")
     */
    public function productsByGeodes(ProductRepository $productRepository): Response
    {
        // Récupérer les produits par catégorie "géodes"
        $geodesStones = $productRepository->findByCategory('géodes');

        return $this->render('products/productGeodes.html.twig', [
            'geodesStones' => $geodesStones,
        ]);
    }

    /**
     * @Route("/products/category/spheres", name="products_by_category_spheres")
     */
    public function productsBySpheres(ProductRepository $productRepository): Response
    {
        // Récupérer les produits par catégorie "sphères"
        $spheresStones = $productRepository->findByCategory('sphères');

        return $this->render('products/productSpheres.html.twig', [
            'spheresStones' => $spheresStones,
        ]);
    }

    /**
     * @Route("/products/category/pointes", name="products_by_category_points")
     */
    public function productsByPoints(ProductRepository $productRepository): Response
    {
        // Récupérer les produits par catégorie "pointes"
        $pointsStones = $productRepository->findByCategory('pointes');

        return $this->render('products/productPoints.html.twig', [
            'pointsStones' => $pointsStones,
        ]);
    }


    // RECHERCHE PRODUIT PAR NOM

 /**
     * @Route("/search", name="search_product")
     */
    public function searchProduct(Request $request, ProductRepository $productRepository): Response
    {
        // Récupére le terme de recherche depuis la requête
        $searchTerm = $request->query->get('search');

        // Récupére les produits correspondant au terme de recherche
        $searchResults = $productRepository->findByProductName($searchTerm);

        return $this->render('products/search.html.twig', [
            'searchTerm' => $searchTerm,
            'searchResults' => $searchResults,
        ]);
    }
    

        // RECHERCHE PRODUIT MULTICRITERES

/**
 * @Route("/products/search", name="search_products")
 */
public function searchProducts(Request $request, ProductRepository $productRepository): Response
{
    $categories = $request->query->get('category');
    $colors = $request->query->get('color');

    // Vérifier si les deux critères sont définis
    if ($categories && $colors) {
        $searchResults = $productRepository->findByCategoriesAndColors($categories, $colors);
    } elseif ($categories) {
        // Si seulement les catégories sont définies
        $searchResults = $productRepository->findByCategories($categories);
    } elseif ($colors) {
        // Si seulement les couleurs sont définies
        $searchResults = $productRepository->findByColors($colors);
    } else {
        // Si aucun critère n'est défini, afficher tous les produits
        $searchResults = $productRepository->findAll();
    }

    return $this->render('products/searchCriteresProduct.html.twig', [
        'searchResults' => $searchResults,
    ]);
}



    // MISE A JOUR DU STOCK

    /**
     * @Route("/update-stock/{productId}/{quantity}", name="update_stock", methods={"POST"})
     */
    public function updateStock(int $productId, int $quantity, ProductRepository $productRepository, EntityManagerInterface $entityManager): Response
    {
        // Récupére le produit à partir de son ID
        $product = $productRepository->find($productId);

        // Vérifie si le produit existe
        if (!$product) {
            return new Response('Le produit n\'existe pas.', Response::HTTP_NOT_FOUND);
        }

        // Mise à jour le stock du produit
        $newStock = $product->getProductStock() + $quantity;
        $product->setProductStock($newStock);

        // Mise à jour la base de données
        $entityManager->persist($product);
        $entityManager->flush();

        // Répond avec un message de succès
        return new Response('Le stock du produit a été mis à jour avec succès.', Response::HTTP_OK);
    }
}