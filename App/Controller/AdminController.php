<?php

require_once __DIR__ . '/../Model/UserModel.php';
require_once __DIR__ . '/../Model/TripModel.php';
require_once __DIR__ . '/../Model/AgenceModel.php';

class AdminController
{
	private function checkAdmin() {
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
}
