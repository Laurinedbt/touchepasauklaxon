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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href='../public/style.css'>
</head>
    <body>
        <?php require_once __DIR__ . '/../header.php'; ?>

        <main>
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

                    require_once __DIR__ . '/../../App/Model/UserModel.php';
                    foreach ($users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user['Nom']) ?></td>
                                <td><?= htmlspecialchars($user['Prenom']) ?></td>
                                <td><?= htmlspecialchars($user['Telephone']) ?></td>
                                <td><?= htmlspecialchars($user['Mail']) ?></td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
        <footer class="d-flex justify-content-center">
            <div><p>&copy; 2026 - MVC PHP</p></div>
        </footer>
    </body>
</html>

