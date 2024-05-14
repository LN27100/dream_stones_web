# Projet Symfony

Bienvenue sur le projet réalisé avec le framework Symfony.

## Configuration du Projet

Pour visionner ce projet, suivez ces étapes :

# Installation de la Base de Données

Avant de démarrer votre application Symfony, vous devez installer la base de données à partir du fichier de dump fourni. Voici comment procéder :

## Récupération du Dump de la Base de Données

Localisez le fichier de dump SQL de la base de données. Dans notre cas, le fichier se trouve à l'emplacement suivant :
`database\Dump20240330.sql`

## Importation du Dump dans MySQL

Une fois que vous avez récupéré le fichier de dump SQL, vous pouvez l'importer dans votre serveur MySQL local en suivant ces étapes :

1. Ouvrez un terminal ou une interface en ligne de commande (CLI) et connectez-vous à votre serveur MySQL en utilisant la commande suivante (remplacez `user` et `password` par vos informations de connexion) :
```bash
mysql -u user -p password 
```

2. Une fois connecté à MySQL, créez une nouvelle base de données (si nécessaire) à l'aide de la commande suivante (remplacez nom_de_la_base_de_donnees par le nom de votre base de données) :

CREATE DATABASE IF NOT EXISTS dream_stones_project;

3. Sélectionnez la base de données nouvellement créée avec la commande suivante :

USE dream_stones_project;

4. Importez le contenu du fichier de dump SQL dans votre base de données en utilisant la commande suivante (assurez-vous de modifier le chemin pour afficher le complet vers le fichier de dump) :

SOURCE chemin_vers_le_fichier\Dump20240330.sql;

 ## Configuration de la Base de Données :

   Créer un nouveau fichier `doctrine.yaml` dans le dossier `config/packages`avec le code ci-dessous en modifiant les paramètres pour indiquer vos identifiants de connexion à la bdd.
    
   Celui-ci étant ajouté dans le fichier .gitignore, vous ne l'aurez pas lors du clone du repo.
    avec vos propres identifiants:

doctrine:
    dbal:
        # Paramètres de connexion à la base de données
        dbname: 'nom_de_votre_base_de_donnees'
        user: 'votre_utilisateur'
        password: 'votre_mot_de_passe'
        host: 'localhost'
        port: '3306'
        driver: 'pdo_mysql'

   orm:
        auto_generate_proxy_classes: true
        naming_strategy: doctrine.orm.naming_strategy.underscore_number_aware
        auto_mapping: true
        mappings:
            App:
                is_bundle: false
                type: annotation
                dir: '%kernel.project_dir%/src/Entity'
                prefix: 'App\Entity'
                alias: App


# Exécutez les commandes Symfony :

Une fois le fichier de configuration de la base de données créé et rempli, vous pouvez maintenant exécuter les commandes Symfony nécessaires pour initialiser la base de données et démarrer votre application. Assurez-vous d'exécuter composer install pour installer toutes les dépendances du projet.

## Installation des Dépendances

composer install


## Démarrage du Serveur Local

Une fois que la base de données est installée et configurée, vous pouvez démarrer le serveur local en utilisant la commande suivante :

symfony server:start

Cela démarrera le serveur local et vous pourrez accéder au projet dans votre navigateur à l'adresse http://localhost:8000/app.

![Capture d'écran du tableau de bord](public/assets/images/screenshot.png)


