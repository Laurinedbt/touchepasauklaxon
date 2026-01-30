<?php

require_once __DIR__ . '/../../Core/DefaultModel.php';

class AgenceModel extends DefaultModel {

        public function getAllCities(): array {
        $stmt = $this->db->query('
            SELECT nom_ville
            FROM agences
            ORDER BY nom_ville
        ');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
}

}

?>