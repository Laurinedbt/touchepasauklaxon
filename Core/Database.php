<?php

function connection() {
    try {
        $bdd = new PDO(
            'mysql:host=localhost;dbname=touche_pas_au_klaxon;charset=utf8mb4',
            'root',
            'root'
        );
        return $bdd;
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}

?>