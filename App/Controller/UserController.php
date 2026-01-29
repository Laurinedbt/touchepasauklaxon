<?php
require_once __DIR__ . '/../Model/UserModel.php';

class UserController {

    public function loginProcess() {
        session_start();

        $mail = $_POST['mail'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new UserModel();
        $user = $userModel->getUserByMail($mail);

        // Vérifier le mot de passe hashé
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_mail'] = $user['Mail'];
            $_SESSION['user_name'] = $user['Prenom'] . ' ' . $user['Nom'];
            $_SESSION['user_phone'] = $user['Telephone'];
            $_SESSION['role'] = $user['role'] ?? 'user';

            header('Location: index.php?action=home');
            exit;
        }

        // Login incorrect
        header('Location: index.php?action=login&error=1');
        exit;
    }
}
