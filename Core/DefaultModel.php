<?php
require_once __DIR__ . '/Database.php';

/**
 * Classe parente pour tous les modèles
 */
class DefaultModel {

    protected PDO $db;

    public function __construct() {
        // On récupère une connexion PDO depuis Database
        $this->db = Database::getConnection();
    }
}

?>
