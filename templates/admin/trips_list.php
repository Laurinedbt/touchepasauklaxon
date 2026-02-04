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
    <title>Trajets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../public/style.css">
</head>
    <body>
        <?php require_once __DIR__ . '/../header.php'; ?>

        <main>
            <h1>Trajets</h1>

                <table class="table table-striped table-bordered">
                    <thead class="text-center">
                        <tr class="dark-row">
                            <th>Nom créateur trajet</th>
                            <th>Départ</th>
                            <th>Date départ</th>
                            <th>Heure départ</th>
                            <th>Destination</th>
                            <th>Date arrivée</th>
                            <th>Heure arrivée</th>
                            <th>Places</th>
                            <th>Places disponibles</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        require_once __DIR__ . '/../../App/Model/TripModel.php';
                        foreach ($trips as $trip): ?>
                                <tr>
                                    <td><?= htmlspecialchars($trip['user_mail']) ?></td>
                                    <td><?= htmlspecialchars($trip['depart']) ?></td>
                                    <td><?= htmlspecialchars($trip['date_depart']) ?></td>
                                    <td><?= htmlspecialchars($trip['heure_depart']) ?></td>
                                    <td><?= htmlspecialchars($trip['destination']) ?></td>
                                    <td><?= htmlspecialchars($trip['date_arrivee']) ?></td>
                                    <td><?= htmlspecialchars($trip['heure_arrivee']) ?></td>
                                    <td><?= htmlspecialchars($trip['places']) ?></td>
                                    <td><?= htmlspecialchars($trip['places_disponibles']) ?></td>
                                    <td>
                                        <a href="index.php?action=admin_trip_delete&id=<?= $trip['id'] ?>" onclick="return confirm('Supprimer ce trajet ?');">
                                            <i class="bi bi-trash text-danger"></i>
                                        </a>
                                    </td>
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

