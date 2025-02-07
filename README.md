Projet de Sécurité - Application de gestion des utilisateurs

Ce projet est une application web permettant à un utilisateur de créer un compte, de se connecter, et d'accéder à une page de bienvenue avec la possibilité de se déconnecter.

Fonctionnalités principales
Page d'inscription : Les utilisateurs peuvent s'inscrire en fournissant un nom d'utilisateur, une adresse e-mail et un mot de passe.
Page de connexion : Les utilisateurs peuvent se connecter avec leur nom d'utilisateur et mot de passe.
Page de bienvenue : Après la connexion réussie, l'utilisateur est redirigé vers une page de bienvenue où il est accueilli par son nom d'utilisateur.
Déconnexion : L'utilisateur peut se déconnecter et revenir à la page d'accueil.
Prérequis
Avant de pouvoir utiliser ce projet, tu dois t'assurer que les éléments suivants sont installés sur ta machine :

PHP 7.x ou supérieur
MySQL ou un autre système de gestion de base de données compatible
Serveur local comme WAMP, XAMPP, ou MAMP pour exécuter l'application PHP en local
Installation
Étape 1 : Cloner le projet
Clone le projet sur ta machine locale à l'aide de la commande suivante (si tu utilises Git) :

bash
Copier
git clone https://github.com/ton-nom-utilisateur/projet-securite.git
Si tu ne veux pas utiliser Git, tu peux aussi télécharger le projet sous forme de fichier zip depuis GitHub.

Étape 2 : Configuration de la base de données
Ouvre le fichier secure_bd.sql dans ton gestionnaire de base de données (phpMyAdmin, MySQL Workbench, ou autre).
Crée la base de données en exécutant le script SQL contenu dans ce fichier. Ce script crée la base de données et la table users avec les colonnes nécessaires.
Exemple de base de données à importer :

CREATE DATABASE projet_de_securite;
USE projet_de_securite;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password_hash VARCHAR(255) NOT NULL
);

Étape 3 : Configuration de la connexion à la base de données
Dans le fichier db.php, assure-toi que les paramètres de connexion à la base de données sont corrects. Remplace les valeurs par défaut par celles adaptées à ton environnement local :

$servername = "localhost";  // Serveur de base de données
$username = "root";         // Nom d'utilisateur de la base de données (souvent 'root')
$password = "";             // Mot de passe de l'utilisateur (si vide, laisse-le comme ça)
$dbname = "projet_de_securite"; // Nom de la base de données

Étape 4 : Lancer le projet localement
Lance ton serveur local (WAMP, XAMPP ou MAMP) et place le dossier du projet dans le répertoire www ou htdocs.
Accède au projet dans ton navigateur via http://localhost/projet-de-securite.
Étape 5 : Créer un utilisateur de test
Tu peux tester l'application avec un utilisateur déjà créé dans la base de données ou en créant un nouvel utilisateur via la page d'inscription.

Identifiants de test :
Nom d'utilisateur : sonia
Email : boundaouisonia00@gmail.com
Mot de passe : 1234n (Le mot de passe est haché et stocké de manière sécurisée dans la base de données)
Étape 6 : Accéder à l'application
Page d'inscription : Accède à register.php pour t'inscrire.
Page de connexion : Accède à login.php pour te connecter avec le nom d'utilisateur et le mot de passe.
Page de bienvenue : Si la connexion est réussie, tu seras redirigé vers welcome.php, où tu verras un message de bienvenue et un bouton pour te déconnecter.

Structure du projet
Voici la structure des fichiers de l'application :

bash
Copier
/projet-de-securite
    /images
        image.jpg  # image fond
    db.php              # Fichier de connexion à la base de données
    index.php           # Page d'accueil
    login.php           # Formulaire de connexion
    logout.php          # Script de déconnexion
    register.php        # Formulaire d'inscription
    secure_bd.sql       # Script SQL pour créer la base de données
    styles.css          # Fichier de styles CSS
    welcome.php         # Page de bienvenue après la connexion
	
Technologies utilisées

Technologies utilisées
PHP : Langage backend principal pour gérer la logique du projet.
MySQL : Base de données utilisée pour stocker les utilisateurs et leurs informations.
HTML/CSS : Pour l'interface utilisateur et la mise en page.
Bootstrap (optionnel) : Pour rendre l'interface responsive et agréable.
password_hash : Utilisé pour hacher les mots de passe et garantir leur sécurité.

Sécurisation du projet
Hachage des mots de passe : Les mots de passe sont hachés à l'aide de password_hash() pour garantir qu'ils ne sont jamais stockés en texte clair dans la base de données.
Requêtes SQL sécurisées : Les requêtes SQL sont préparées avec bind_param pour éviter les injections SQL.
Session sécurisée : La session est utilisée pour maintenir la connexion de l'utilisateur, avec session_regenerate_id() pour renforcer la sécurité.
Vérification de l'authentification : Les utilisateurs non authentifiés sont redirigés vers la page de connexion.

Auteurs
Sonia Boundaoui
Licence
Ce projet est sous licence MIT. Voir le fichier LICENSE pour plus de détails.