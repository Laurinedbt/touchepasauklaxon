<?php
session_start();

require_once __DIR__ . '/../App/Controller/UserController.php';

$userController = new UserController();

$action = $_GET['action'] ?? 'home';

switch ($action) {

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->loginProcess(); // traite le POST
        } else {
            require_once __DIR__ . '/../templates/login.php'; // affiche le formulaire
        }
        break;

    case 'logout':
        session_destroy();
        header('Location: index.php');
        exit;

    case 'home':
    default:
        require_once __DIR__ . '/../templates/home.php';
        break;

     
    // Pour la page création de trajet
    case 'trip_create':
    if (!isset($_SESSION['user_mail'])) {
        header('Location: index.php?action=login');
        exit;
    }

    require_once __DIR__ . '/../App/Controller/TripController.php';

    $tripController = new TripController();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tripController->createProcess(); // traite le formulaire
    } else {
        $tripController->createForm(); // affiche le formulaire
    }
    break;

}

