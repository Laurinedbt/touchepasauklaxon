<?php
session_start();

require_once __DIR__ . '/../App/Controller/UserController.php';
require_once __DIR__ . '/../App/Controller/TripController.php';

$userController = new UserController();
$tripController = new TripController();

$action = $_GET['action'] ?? 'home';

switch ($action) {

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->loginProcess();
        } else {
            require_once __DIR__ . '/../templates/login.php';
        }
        break;

    case 'logout':
        session_destroy();
        header('Location: index.php');
        exit;

    case 'trip_create':
        if (!isset($_SESSION['user_mail'])) {
            header('Location: index.php?action=login');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tripController->createProcess();
        } else {
            require_once __DIR__ . '/../templates/trip_create.php';
        }
        break;

    case 'home':
    default:
        require_once __DIR__ . '/../templates/home.php';
        break;
}


