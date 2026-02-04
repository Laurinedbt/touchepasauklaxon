<?php

require_once __DIR__ . '/../Model/UserModel.php';
require_once __DIR__ . '/../Model/TripModel.php';
require_once __DIR__ . '/../Model/AgenceModel.php';

/**
 * Gére les fonctionnalités réservées aux administrateurs
 * 
 * Permet de gérer les utilisateurs, les trajets et les agences
 */
class AdminController
{
    /** Vérifie que l’utilisateur est administrateur 
     * Redirige vers la page d’accueil si l'utilisateur n’est pas admin
     * @return void
    */
	private function checkAdmin(): void {
        if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
            header('Location: index.php?action=home');
            exit;
        }
    }

    public function usersList() {
        $this->checkAdmin();
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();

        require __DIR__ . '/../../templates/admin/users_list.php';
    }

    public function tripsList() {
        $this->checkAdmin();
        $tripModel = new TripModel();
        $trips = $tripModel->getAllTrips();

        require __DIR__ . '/../../templates/admin/trips_list.php';
    }

    public function agencesList() {
        $this->checkAdmin();
        $agenceModel = new AgenceModel();
        $agences = $agenceModel->getAllCities();

        require __DIR__ . '/../../templates/admin/agences_list.php';
    }


    /* GESTION AGENCES */

    public function agenceCreateForm(): void {
    $this->checkAdmin();
    require __DIR__ . '/../../templates/admin/agence_create.php';
}

    public function agenceCreateProcess(): void {
        $this->checkAdmin();

        $nom = trim($_POST['nom_ville'] ?? '');
        if ($nom === '') {
            header('Location: index.php?action=admin_agence_create&error=1');
            exit;
        }

        $agenceModel = new AgenceModel();
        $agenceModel->createAgence($nom);

        header('Location: index.php?action=admin_agences');
        exit;
    }

    public function agenceEditForm(int $id): void {
        $this->checkAdmin();

        $agenceModel = new AgenceModel();
        $agence = $agenceModel->getAgenceById($id);

        if (!$agence) {
            header('Location: index.php?action=admin_agences');
            exit;
        }

        require __DIR__ . '/../../templates/admin/agence_edit.php';
    }

    public function agenceEditProcess(): void {
        $this->checkAdmin();

        $id = (int)($_POST['id'] ?? 0);
        $nom = trim($_POST['nom_ville'] ?? '');

        if ($id <= 0 || $nom === '') {
            header('Location: index.php?action=admin_agences');
            exit;
        }

        $agenceModel = new AgenceModel();
        $agenceModel->updateAgence($id, $nom);

        header('Location: index.php?action=admin_agences');
        exit;
    }

    public function agenceDelete(int $id): void {
        $this->checkAdmin();

        if ($id <= 0) {
            header('Location: index.php?action=admin_agences');
            exit;
        }

        $agenceModel = new AgenceModel();
        $agenceModel->deleteAgence($id);

        header('Location: index.php?action=admin_agences');
        exit;
    }

    /* GESTION TRAJETS */
    public function tripDelete(int $id): void {
        $this->checkAdmin();

        if ($id <= 0) {
            header('Location: index.php?action=admin_trips');
            exit;
        }

        $tripModel = new TripModel();
        $tripModel->deleteTrip($id);

        header('Location: index.php?action=admin_trips');
        exit;
    }

}
