<?php
require_once __DIR__ . '/../Model/TripModel.php';

class TripController {

    // Affiche le formulaire de création
    public function createForm() {
        require __DIR__ . '/../templates/trip_create.php';
    }

    // Traite le formulaire
    public function createProcess() {
    session_start();

    $tripModel = new TripModel();

    $tripModel->createTrip([
        'user_mail' => $_SESSION['user_mail'], // récupéré depuis la session
        'depart' => $_POST['depart'] ?? '',
        'destination' => $_POST['destination'] ?? '',
        'date_depart' => $_POST['date_depart'] ?? '',
        'heure_depart' => $_POST['heure_depart'] ?? '',
        'date_arrivee' => $_POST['date_arrivee'] ?? '',
        'heure_arrivee' => $_POST['heure_arrivee'] ?? '',
        'places' => (int)($_POST['places'] ?? 1),
    ]);

    header('Location: index.php?action=home');
    exit;
}

}
