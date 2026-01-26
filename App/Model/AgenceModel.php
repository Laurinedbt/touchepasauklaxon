<?php

require_once __DIR__ . '/../../Core/DefaultModel.php';

class AgenceModel extends DefaultModel {

    public function findAll(): array {
        $stmt = $this->db->query("SELECT * FROM agences");
        return $stmt->fetchAll();
    }
}

?>