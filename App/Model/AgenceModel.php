<?php

require_once __DIR__ . "/../Core/DefaultModel.php";

/**
 * Récupère toutes les agences
 * @return array Liste des agences
 */
function getAllAgences() {
    return findAll('SELECT * FROM agences');
}

/**
 * Récupère une agence par son ID
 * @param int $id
 * @return array|false
 */
function getAgenceById($id) {
    $bdd = connection();
    $stmt = $bdd->prepare('SELECT * FROM agences WHERE id = :id');
    $stmt->execute(['id' => $id]);
    return $stmt->fetch();
}

?>