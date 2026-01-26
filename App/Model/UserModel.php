<?php

require_once __DIR__ . "/../Core/DefaultModel.php";

/**
 * Récupère tous les utilisateurs
 * @return array Liste des utilisateurs
 */
function getAllUsers() {
    return findAll('SELECT * FROM users');
}

/**
 * Récupère un utilisateur par son email
 * @param string $email L'email de l'utilisateur
 * @return array|false Les données de l'utilisateur ou false
 */
function getUserByEmail($email) {
    $bdd = connection();
    $stmt = $bdd->prepare('SELECT * FROM users WHERE mail = :email');
    $stmt->execute(['email' => $email]);
    return $stmt->fetch();
}

/**
 * Vérifie les identifiants de connexion
 * @param string $email
 * @param string $password
 * @return array|false Les données de l'utilisateur ou false
 */
function checkLogin($email, $password) {
    $bdd = connection();
    $stmt = $bdd->prepare('SELECT * FROM users WHERE mail = :email AND mot_de_passe = :password');
    $stmt->execute([
        'email' => $email,
        'password' => $password // À adapter selon si vous utilisez un hash
    ]);
    return $stmt->fetch();
}

?>