<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Sécurité
if (!isset($trip) || !$trip) {
    header('Location: index.php?action=home');
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un trajet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/style.css">
</head>
    <body>

        <main class="mx-5">

        <h2>Modifier un trajet</h2>

            <form action="index.php?action=trip_edit" method="POST">

                <!-- ID du trajet (indispensable pour UPDATE) -->
                <input type="hidden" name="id" value="<?= htmlspecialchars((string)$trip['id']) ?>">
               
                <label for="name_surname">Nom & Prénom :</label>
                <input type="text" name="name_surname" value="<?= htmlspecialchars($_SESSION['user_name'] ?? '') ?>" readonly><br><br>

                <label for="user_mail">Email :</label>
                <input type="email" name="user_mail" value="<?= htmlspecialchars($_SESSION['user_mail'] ?? '') ?>" readonly><br><br>

                <!-- Infos sur le trajet -->
                <label for="depart">Départ</label>
                <input list="villes" name="depart" id="depart" required value="<?= htmlspecialchars((string)$trip['depart']) ?>"><br><br>

                <label for="destination">Destination</label>
                <input list="villes" name="destination" id="destination" required value="<?= htmlspecialchars((string)$trip['destination']) ?>"><br><br>

                <datalist id="villes">
                    <?php foreach ($villes as $ville): ?>
                        <option value="<?= htmlspecialchars($ville['nom_ville']) ?>"></option>
                    <?php endforeach; ?>
                </datalist>
                

                <label for="date_depart">Date départ</label>
                <input type="date" name="date_depart" id="date_depart" required value="<?= htmlspecialchars((string)$trip['date_depart']) ?>">

                <label for="heure_depart">Heure départ</label>
                <input type="time" name="heure_depart" id="heure_depart" required value="<?= htmlspecialchars((string)$trip['heure_depart']) ?>"><br><br>

                <label for="date_arrivee">Date arrivée</label>
                <input type="date" name="date_arrivee" id="date_arrivee" required value="<?= htmlspecialchars((string)$trip['date_arrivee']) ?>"    >

                <label for="heure_arrivee">Heure arrivée</label>
                <input type="time" name="heure_arrivee" id="heure_arrivee" required value="<?= htmlspecialchars((string)$trip['heure_arrivee']) ?>"><br><br>

                <label for="places">Places</label>
                <input type="number" name="places" id="places" min="1" required value="<?= htmlspecialchars((string)$trip['places']) ?>" readonly><br><br>

                <label for="places_disponibles">Places disponibles</label>
                <input type="number" name="places_disponibles" id="places_disponibles" 
                    min="0" max="<?= (int)$trip['places'] ?>" required 
                    value="<?= htmlspecialchars($trip['places_disponibles']) ?>" required><br><br>

                <input type="submit" value="Modifier le trajet" class="btn btn-dark">
                <a href="index.php?action=home" class="btn btn-secondary">Annuler</a>
            </form>
        </main>
    </body>
</html>
