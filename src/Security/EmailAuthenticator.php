<?php

namespace App\Security;

use App\Entity\Userprofil;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Http\Authenticator\AbstractLoginFormAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\CsrfTokenBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Credentials\PasswordCredentials;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Util\TargetPathTrait;

class EmailAuthenticator extends AbstractLoginFormAuthenticator
{
    use TargetPathTrait;

    public const LOGIN_ROUTE = 'app_login';

    // Générateur d'URL et gestionnaire d'entités utilisés par l'authentificateur
    private $urlGenerator;
    private $entityManager;

    // Constructeur pour initialiser le générateur d'URL et le gestionnaire d'entités
    public function __construct(UrlGeneratorInterface $urlGenerator, EntityManagerInterface $entityManager)
    {
        $this->urlGenerator = $urlGenerator;
        $this->entityManager = $entityManager;
    }

    // Méthode d'authentification, prend une requête en paramètre et renvoie un objet Passport
    public function authenticate(Request $request): Passport
    {
        // Récupérer l'e-mail depuis la requête
        $email = $request->request->get('email', '');
        // Enregistrer l'e-mail dans la session pour le réutiliser plus tard
        $request->getSession()->set(Security::LAST_USERNAME, $email);

        // Créer un objet Passport pour l'authentification
        return new Passport(
            // Badge utilisateur basé sur l'e-mail
            new UserBadge($email, function ($email) {
                // Charger l'utilisateur depuis la base de données en fonction de son adresse e-mail
                return $this->entityManager->getRepository(Userprofil::class)
                    ->findOneBy(['email' => $email]);
            }),
            // Badge des identifiants de mot de passe
            new PasswordCredentials($request->request->get('password', '')),
            [
                // vérifier que la soumission du formulaire provient bien du site web attendu et non d'un site malveillant
                new CsrfTokenBadge('authenticate', $request->request->get('_csrf_token')),
            ]
        );
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        if ($targetPath = $this->getTargetPath($request->getSession(), $firewallName)) {
            return new RedirectResponse($targetPath);
        }
        // Rediriger vers la page principale de l'application en cas de succès de l'authentification
        return new RedirectResponse($this->urlGenerator->generate('app'));
    }

    protected function getLoginUrl(Request $request): string
    {
        // Renvoyer l'URL de la page de connexion
        return $this->urlGenerator->generate(self::LOGIN_ROUTE);
    }
}


// Symfony, l'authentification est basée sur un système de "badges" (ou "jetons"), qui représentent différentes informations nécessaires pour authentifier un utilisateur.