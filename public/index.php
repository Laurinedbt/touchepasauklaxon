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
        $tripController->createForm();
    }
    break;

    case 'trip_edit':
    if (!isset($_SESSION['user_mail'])) {
        header('Location: index.php?action=login');
        exit;
    }

    require_once __DIR__ . '/../App/Controller/TripController.php';
    $tripController = new TripController();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tripController->editProcess();
    } else {
        $tripController->editForm($_GET['id'] ?? null);
    }
    break;

    case 'trip_delete':
    if (!isset($_SESSION['user_mail'])) {
        header('Location: index.php?action=login');
        exit;
    }

    $tripController->deleteProcess((int)($_GET['id'] ?? 0));
    break;



    case 'home':
    default:
        require_once __DIR__ . '/../templates/home.php';
        break;

    // Admin routes
    
    case 'admin_users':
    case 'admin_trips':
    case 'admin_agences':
    case 'admin_agence_create':
    case 'admin_agence_edit':
    case 'admin_agence_delete':
    case 'admin_trip_delete':

    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        header('Location: index.php?action=home');
        exit;
    }

    require_once __DIR__ . '/../App/Controller/AdminController.php';
    $admin = new AdminController();

    if ($action === 'admin_users') $admin->usersList();
    if ($action === 'admin_trips') $admin->tripsList();
    if ($action === 'admin_agences') $admin->agencesList();

    if ($action === 'admin_agence_create') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') $admin->agenceCreateProcess();
        else $admin->agenceCreateForm();
    }

    if ($action === 'admin_agence_edit') {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') $admin->agenceEditProcess();
        else $admin->agenceEditForm((int)($_GET['id'] ?? 0));
    }

    if ($action === 'admin_agence_delete') {
        $admin->agenceDelete((int)($_GET['id'] ?? 0));
    }

    if ($action === 'admin_trip_delete') {
        $admin->tripDelete((int)($_GET['id'] ?? 0));
    }

    break;


}


