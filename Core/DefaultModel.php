<?php 

require "Database.php";

function findAll($stmt) {
    // On charge la connexion à la BDD
    $bdd = connection();

    // On exécute notre requête SQL récupérée en paramètre
    $query = $bdd->query($stmt);

    $result = $query->fetchAll();

    if ($result) {
        return $result;
    } else {
        die("Une erreur s'est produite lors de la récupération des données");
    }
}