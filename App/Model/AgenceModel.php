<?php

require_once __DIR__ . '/../../Core/DefaultModel.php';

class AgenceModel extends DefaultModel {

        public function getAllCities(): array {
        $stmt = $this->db->query('
            SELECT id, nom_ville
            FROM agences
            ORDER BY nom_ville
        ');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createAgence(string $nom_ville): bool {
        $stmt = $this->db->prepare('
            INSERT INTO agences (nom_ville)
            VALUES (:nom_ville)
        ');
        return $stmt->execute(['nom_ville' => $nom_ville]);
    }

    public function getAgenceById(int $id): array|false {
        $stmt = $this->db->prepare('SELECT id, nom_ville FROM agences WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateAgence(int $id, string $nom_ville): bool {
        $stmt = $this->db->prepare('
            UPDATE agences
            SET nom_ville = :nom_ville
            WHERE id = :id
        ');
        return $stmt->execute(['nom_ville' => $nom_ville, 'id' => $id]);
    }

    public function deleteAgence(int $id): bool {
        $stmt = $this->db->prepare('DELETE FROM agences WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }

}

?>