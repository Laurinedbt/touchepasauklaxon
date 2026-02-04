# Touche pas au klaxon

Application web de covoiturage développé en PHP selon une architecture MVC.
Elle permet aux utilisateurs de proposer des trajets entre les différentes agences de l'entreprise, qui possède des implantations géographiques multiples, et aux administrateurs de gérer
les utilisateurs, trajets et agences.

L’application est destinée à être déployée sur l’intranet de l’entreprise.


## Prérequis

- PHP 8.x
- MySQL / MariaDB
- Serveur local (XAMPP, WAMP ou MAMP)

## Installation

1. Cloner le projet
```bash
'git clone https://github.com/TON_COMPTE/klaxon.git '
```

2. Placer le projet dans le dossier du serveur local : C:/xampp/htdocs/klaxon

- Créer la base de données

- Ouvrir phpMyAdmin

3. Créer une base de données nommée touche_pas_au_klaxon

- Importer le fichier SQL fourni (tables users, trips, agences)

4. Configurer la connexion à la base de données

- Modifier le fichier : Core/Database.php
```bash
    return new PDO(
        'mysql:host=localhost;dbname=touche_pas_au_klaxon;charset=utf8mb4',
        'root',
        ''
    );
```


5. Lancer l’application

- Dans le navigateur : http://localhost/klaxon




## Compte et rôles

- Utilisateur connecté

Cette page affichera, en plus des informations de la page d’accueil :

• Un bouton permettant d’afficher les informations complémentaires dans une fenêtre
modale avec :
    • L’identité de la personne qui propose le trajet,
    • Son numéro de téléphone,
    • Son adresse email,
    • Le nombre total de places,
    • Si l’utilisateur est l’auteur d’un trajet, un bouton lui permettant d’accéder à la
    modification de ce trajet,
    • Si l’utilisateur est l’auteur d’un trajet, un bouton lui permettant de supprimer le trajet.
    

- Création d’un trajet :

Cette page doit permettre à un utilisateur de créer un nouveau trajet.

Les informations concernant l’utilisateur (nom, prénom, adresse email et téléphone seront prérenseignées et non modifiables.
Des contrôles de cohérence doivent être réalisés. 

- Tableau de bord de l’administrateur :

Le tableau de bord doit permettre à l’administrateur de :
• Lister les utilisateurs,
• Lister les agences,
• Créer, modifier et supprimer une agence,
• Lister les trajets,
• Supprimer un trajet.


## Fonctionnalités

- Authentification sécurisée (mots de passe hashés)
- Message flash de confirmation

## Base de données

Les scripts SQL sont disponibles dans le dossier /database.
Les documents de conception (MCD / MLD) sont disponibles dans "/docs".


## Technologies utilisées :

PHP 8
MySQL
HTML5 / Sass
Bootstrap 5
Bootstrap Icons
JavaScript



