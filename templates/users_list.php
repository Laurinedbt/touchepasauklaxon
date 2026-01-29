<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listes des utilisateurs</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
    <body>

        <main class="mx-5">

        <h1>Listes des utilisateurs</h1>

        <table class="table table-striped table-bordered">
            <thead class="text-center">
                <tr class="dark-row">
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Telephone</th>
                    <th>Mail</th>
                </tr>
            </thead>
            <tbody>
                <?php

                require_once __DIR__ . '/../App/Model/UserModel.php';
                foreach ($users as $user): ?>
                        <tr>
                            <td><?= htmlspecialchars($user['Nom']) ?></td>
                            <td><?= htmlspecialchars($user['Prenom']) ?></td>
                            <td><?= htmlspecialchars($user['Telephone']) ?></td>
                            <td><?= htmlspecialchars($trip['Mail']) ?></td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        </main>
    </body>
</html>

