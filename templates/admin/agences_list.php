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
    <title>Listes des agences</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
    <body>

        <main class="mx-5">

            <h1>Listes des agences</h1>

            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr class="dark-row">
                        <th>Nom ville/agence</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    require_once __DIR__ . '/../../App/Model/AgenceModel.php';
                    foreach ($agences as $agence): ?>
                            <tr>
                                <td><?= htmlspecialchars($agence['nom_ville']) ?></td>
                            </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </main>
    </body>
    <footer class="d-flex justify-content-center">
        <div><p>&copy; 2026 - MVC PHP</p></div>
    </footer>
</html>

