<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(Request $request,
    EntityManagerInterface $manager): Response
    {
        $contact = new Contact(); 

        $form = $this->createForm(ContactType::class, $contact); // Crée un formulaire en utilisant ContactType et l'entité Contact

        $form->handleRequest($request); // Gère la soumission du formulaire avec la requête HTTP actuelle
        if ($form->isSubmitted() && $form->isValid()) { 
         // Dump and die : affiche les données soumises par le formulaire et arrête l'exécution
        // dd($contact);
            $contact = $form->getData(); // Récupère les données soumises par le formulaire
            $manager ->persist($contact); // Persiste les données dans la base de données
            $manager->flush(); // Exécute les opérations SQL nécessaires pour synchroniser l'entité avec la base de données

            // Message flash de succès et redirection
            $this->addFlash(
                'success',
                'Votre demande a été envoyé avec succès !'
            );
            return $this->redirectToRoute('app_contact');
        } else {
            $this->addFlash(
                'danger',
                $form->getErrors()
            );
        }
        
        return $this->render('contact/contact.html.twig', [ 
            'form' => $form->createView(), 
        ]);
    }
}
