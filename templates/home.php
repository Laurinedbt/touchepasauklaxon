<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page d'accueil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="../public/style.css">
    </head>
    <body>

    <?php require_once 'header.php'; ?>
    
        <main class="mx-5">

            <div class="mb-3">
                <p class="dark-color info-text py-2">
                    <?php if (!isset($_SESSION['user_mail'])): ?>
                        Pour obtenir plus d'informations sur un trajet, veuillez vous connecter
                    <?php else: ?>
                        Trajets proposés
                    <?php endif; ?>
                </p>
            </div>

            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr class="dark-row">
                        <th>Départ</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Destination</th>
                        <th>Date</th>
                        <th>Heure</th>
                        <th>Places</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tripModel = new TripModel();
                    $trips = $tripModel->getAvailableTrips();

                    foreach ($trips as $trip): ?>
                        <tr>
                            <td><?= htmlspecialchars($trip['depart']) ?></td>
                            <td><?= htmlspecialchars($trip['date_depart']) ?></td>
                            <td><?= htmlspecialchars($trip['heure_depart']) ?></td>
                            <td><?= htmlspecialchars($trip['destination']) ?></td>
                            <td><?= htmlspecialchars($trip['date_arrivee']) ?></td>
                            <td><?= htmlspecialchars($trip['heure_arrivee']) ?></td>
                            <td><?= htmlspecialchars($trip['places_disponibles']) ?></td>
                            <td></td>
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