<?php
require_once __DIR__ . '/../../Core/DefaultModel.php';

class TripModel extends DefaultModel {

    /**
     * Crée un nouveau trajet
     * @param array $data Tableau contenant : 
     * 'user_mail', 'depart', 'date_depart', 'heure_depart',
     * 'destination', 'date_arrivee', 'heure_arrivee',
     * 'places', 'places_disponibles'
     */
    public function createTrip(array $data): void {
        $stmt = $this->db->prepare('
            INSERT INTO trips (
                user_mail, depart, date_depart, heure_depart,
                destination, date_arrivee, heure_arrivee,
                places, places_disponibles
            ) VALUES (
                :user_mail, :depart, :date_depart, :heure_depart,
                :destination, :date_arrivee, :heure_arrivee,
                :places, :places_disponibles
            )
        ');

        $stmt->execute([
            ':user_mail' => $data['user_mail'],
            ':depart' => $data['depart'],
            ':date_depart' => $data['date_depart'],
            ':heure_depart' => $data['heure_depart'],
            ':destination' => $data['destination'],
            ':date_arrivee' => $data['date_arrivee'],
            ':heure_arrivee' => $data['heure_arrivee'],
            ':places' => $data['places'],
            ':places_disponibles' => $data['places_disponibles']
        ]);
    }

    /**
     * Récupère tous les trajets avec places disponibles et dates/horaires futurs
     * @return array
     */
    public function getAvailableTrips(): array {
        $stmt = $this->db->query('
            SELECT id, depart, date_depart, heure_depart, 
                   destination, date_arrivee, heure_arrivee, places, 
                   places_disponibles
            FROM trips
            WHERE places_disponibles > 0
              AND (date_depart > CURDATE() OR (date_depart = CURDATE() AND heure_depart >= NOW()))
            ORDER BY date_depart ASC, heure_depart ASC
        ');

        return $stmt->fetchAll();
    }

    public function getAllTrips(): array {
        $stmt = $this->db->query('
        SELECT *
        FROM trips');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


