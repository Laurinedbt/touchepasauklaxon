<?php

require_once __DIR__ . '/../Model/UserModel.php';

class UserController {
    public function loginProcess() {
        session_start();
        
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        $userModel = new UserModel();

        $user = $userModel->checkLogin($mail, $password);

        if ($user) {
            $_SESSION['user_mail'] = $user['Mail'];
            $_SESSION['user_name'] = $user['Prenom'] . ''. $user['Nom'];
            $_SESSION['role'] = $user['role'];

            header('Location: home.php');
            exit;
        }


        require_once __DIR__ . '/../templates/login.php';
    }
}

?>