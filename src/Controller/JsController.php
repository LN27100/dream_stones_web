<?php

// Servir le fichier JavaScript à partir de votre application Symfony vous donne plus de contrôle sur la manière dont il est livré, sécurisé et manipulé, ce qui peut être avantageux dans de nombreux cas d'utilisation.

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class JsController extends AbstractController
{
    public function serveAppJs(): BinaryFileResponse
    {
        // Chemin du fichier script.js
        $filePath = 'C:/laragon/www/cesi_dream_stones/public/assets/js/script.js';
        
        // Vérification de l'existence du fichier
        if (!file_exists($filePath)) {
            throw new NotFoundHttpException('Fichier script.js non trouvé.');
        }

        // Renvoie le contenu du fichier JavaScript
        return new BinaryFileResponse($filePath);
    }
}

