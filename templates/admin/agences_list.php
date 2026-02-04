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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../public/style.css">
</head>
    <body>
        <?php require_once __DIR__ . '/../header.php'; ?>

        <main>
            <h1>Listes des agences</h1>
            <a href="index.php?action=admin_agence_create" class="btn btn-dark my-3">Créer une agence</a>

            <table class="table table-striped table-bordered">
                <thead class="text-center">
                    <tr class="dark-row">
                        <th>Nom ville/agence</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    require_once __DIR__ . '/../../App/Model/AgenceModel.php';
                    foreach ($agences as $agence): ?>
                            <tr>
                                <td><?= htmlspecialchars($agence['nom_ville']) ?></td>

                                <td class="text-center">
                                    <!-- MODIFIER AGENCE -->
                                    <a href="index.php?action=admin_agence_edit&id=<?= (int)$agence['id'] ?>" class="me-2">
                                        <i class="bi bi-pencil-square text-primary"></i>
                                    </a>

                                    <!-- SUPPRIMER AGENCE -->
                                    <a href="index.php?action=admin_agence_delete&id=<?= (int)$agence['id'] ?>"
                                    onclick="return confirm('Supprimer cette agence ?');">
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

