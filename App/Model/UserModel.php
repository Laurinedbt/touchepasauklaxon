<?php

require_once __DIR__ . '/DefaultModel.php';

class UserModel extends DefaultModel {

    /**
     * Récupère tous les utilisateurs
     */
    public function getAllUsers(): array {
        $stmt = $this->db->query('SELECT * FROM users');
        return $stmt->fetchAll();
    }

    /**
     * Récupère un utilisateur par son mail
     */
    public function getUserByMail(string $mail): array|false {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE Mail = :mail');
        $stmt->execute(['mail' => $mail]);
        return $stmt->fetch();
    }

    /**
     * Vérifie les identifiants de connexion
     */
    public function checkLogin(string $mail, string $password): array|false {
        $stmt = $this->db->prepare('SELECT * FROM users WHERE Mail = :mail');
        $stmt->execute(['mail' => $mail]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }

        return false;
    }
}
