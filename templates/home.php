<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Page d'accueil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

        <link rel="stylesheet" href="../public/style.css">
    </head>
    <body>

    <?php require_once 'header.php'; ?>

    <?php require_once __DIR__ . '/../Core/Flash.php'; 

        $flash = getFlash();
        if ($flash): ?>
        <div>
            <div class="alert alert-<?= htmlspecialchars($flash['type']) ?> alert-dismissible fade show text-center mx-5" role="alert">
                <?= htmlspecialchars($flash['message']) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    <?php endif; ?>
    
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
                        <?php if (isset($_SESSION['user_mail'])): ?>
                            <th></th>
                        <?php endif; ?>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    require_once __DIR__ . '/../App/Model/TripModel.php';

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

                            <!-- ICÔNES ACTIONS -->

                            <?php if (isset($_SESSION['user_mail'])): ?>
                            <td class="text-center">

                                <!-- MODAL VOIR INFOS -->
                                <?php if (isset($_SESSION['user_mail'])): ?>
                                    <i class="bi bi-eye"
                                        role="button"
                                        data-bs-toggle="modal"
                                        data-bs-target="#tripModal"
                                        data-auteur="<?= htmlspecialchars(($trip['Prenom'] ?? '').' '.($trip['Nom'] ?? '')) ?>"
                                        data-phone="<?= htmlspecialchars($trip['Telephone'] ?? '') ?>"
                                        data-mail="<?= htmlspecialchars($trip['Mail'] ?? '') ?>"
                                        data-places="<?= htmlspecialchars($trip['places'] ?? '') ?>">
                                    </i>
                                <?php endif; ?>

                                <!-- MODAL MODIFIER TRAJET -->
                                <?php if ($_SESSION['user_mail'] === $trip['user_mail']): ?>
                                    <a href="index.php?action=trip_edit&id=<?= $trip['id'] ?>" class="me-2">
                                        <i class="bi bi-pencil-square text-dark"></i>
                                    </a>
                                <?php endif; ?>

                                <!-- MODAL SUPPRIMER TRAJET -->
                                <?php if ($_SESSION['user_mail'] === $trip['user_mail']): ?>
                                    <a href="index.php?action=trip_delete&id=<?= $trip['id'] ?>"
                                        class="text-dark"
                                        onclick="return confirm('Supprimer ce trajet ?');">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>

        <?php require_once 'modal.php'; ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    
    </body>
    <footer class="d-flex justify-content-center">
        <div><p>&copy; 2026 - MVC PHP</p></div>
    </footer>
</html>