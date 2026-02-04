<?php
require_once __DIR__ . '/../Model/TripModel.php';
require_once __DIR__ . '/../Model/AgenceModel.php';

class TripController {

   
    /**
     * Affiche le formulaire de création d’un trajet
     *
     * @return void
     */
    public function createForm() {
        $villes = $this->getCities();
        require __DIR__ . '/../../templates/trip_create.php';
    }

    /**
     * Traite la soumission du formulaire de création d’un trajet
     *
     * @return void
     */
    public function createProcess(): void {
        
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

        require_once __DIR__ . '/../../Core/Flash.php';
        setFlashMessage('Le trajet a été créé avec succès.', 'success');

        header('Location: index.php?action=home');
        exit;
    }

    /**
     * Récupère la liste des villes (agences)
     *
     * @return array
     */

    public function getCities(): array {
        $agenceModel = new AgenceModel();
        return $agenceModel->getAllCities();
    }


    /**
     * Affiche le formulaire de modification d’un trajet
     *
     * @param int|null $id Identifiant du trajet
     * @return void
     */

    public function editForm(?int $id) {
    if (!$id) {
        header('Location: index.php?action=home');
        exit;
    }

    $tripModel = new TripModel();
    $trip = $tripModel->getTripById($id);

    // sécurité : seul l'auteur peut modifier
    if (!$trip || $trip['user_mail'] !== $_SESSION['user_mail']) {
        header('Location: index.php?action=home');
        exit;
    }

    $villes = $this->getCities();

    require __DIR__ . '/../../templates/trip_edit.php';
    }


    /**
     * Traite la modification d’un trajet
     *
     * @return void
     */

    public function editProcess() {
        $tripModel = new TripModel();

        $tripModel->updateTrip($_POST);

        require_once __DIR__ . '/../../Core/Flash.php';
        setFlashMessage('Le trajet a été modifié avec succès.', 'success');

        header('Location: index.php?action=home');
        exit;
    }

    /**
     * Traite la suppression d’un trajet
     *
     * @param int $id Identifiant du trajet
     * @return void
     */
    public function deleteProcess(int $id) {
        if (!$id) {
            header('Location: index.php?action=home');
            exit;
        }

        $tripModel = new TripModel();
        $trip = $tripModel->getTripById($id);

        // sécurité : seul l’auteur peut supprimer
        if (!$trip || $trip['user_mail'] !== $_SESSION['user_mail']) {
            header('Location: index.php?action=home');
            exit;
        }

        $tripModel->deleteTrip($id);

        require_once __DIR__ . '/../../Core/Flash.php';
        setFlashMessage('Le trajet a été supprimé avec succès.', 'success');

        header('Location: index.php?action=home');
        exit;
    }


}
