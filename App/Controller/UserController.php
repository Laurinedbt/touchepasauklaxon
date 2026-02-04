<?php
require_once __DIR__ . '/../Model/UserModel.php';

/**
 * Gére l’authentification des utilisateurs
 */
class UserController {

    /**
     * Traite la soumission du formulaire de connexion
     *
     * Vérifie les identifiants de l'utilisateur,
     * initialise la session et redirige vers la page d’accueil
     * en cas de succès.
     *
     * @return void
     */
    public function loginProcess() {
        session_start();

        $mail = $_POST['mail'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new UserModel();
        $user = $userModel->getUserByMail($mail);

        // Vérifie le mot de passe hashé
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_mail'] = $user['Mail'];
            $_SESSION['user_name'] = $user['Prenom'] . ' ' . $user['Nom'];
            $_SESSION['role'] = $user['role'] ?? 'user';

            header('Location: index.php?action=home');
            exit;
        }

        // Login incorrect
        header('Location: index.php?action=login&error=1');
        exit;
    }
}
