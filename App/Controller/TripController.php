<?php
require_once __DIR__ . '/../Model/TripModel.php';
require_once __DIR__ . '/../Model/AgenceModel.php';

class TripController {

    // Affiche le formulaire de création
    public function createForm() {
        
        require __DIR__ . '/../templates/trip_create.php';
    }

    // Traite le formulaire
    public function createProcess() {

    $tripModel = new TripModel();

    $tripModel->createTrip([
        'user_mail' => $_SESSION['user_mail'],
        'depart' => $_POST['depart'] ?? '',
        'destination' => $_POST['destination'] ?? '',
        'date_depart' => $_POST['date_depart'] ?? '',
        'heure_depart' => $_POST['heure_depart'] ?? '',
        'date_arrivee' => $_POST['date_arrivee'] ?? '',
        'heure_arrivee' => $_POST['heure_arrivee'] ?? '',
        'places' => (int)($_POST['places'] ?? 1),
        'places_disponibles' => (int)($_POST['places'] ?? 1)
    ]);

    header('Location: index.php?action=home');
    exit;
}

    public function getCities(): array {
        $agenceModel = new AgenceModel();
        return $agenceModel->getAllCities();
    }


}
