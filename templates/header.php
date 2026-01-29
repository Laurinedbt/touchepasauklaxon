<?php
// Toujours démarrer la session si ce n'est pas déjà fait
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <nav class="navbar my-3 mx-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Touche pas au klaxon</a>

            <div class="ms-auto">
                <?php if (!isset($_SESSION['user_mail'])): ?>
                    <!-- Utilisateur non connecté -->
                    <a href="index.php?action=login" class="btn btn-dark">Connexion</a>

                <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                    <!-- Admin connecté -->
                    <a href="index.php?action=users_list" class="btn btn-dark">Utilisateurs</a>
                    <a href="index.php?action=agences_list" class="btn btn-dark">Agences</a>
                    <a href="index.php?action=trips_list" class="btn btn-dark">Trajets</a>
                    <span class="me-2">Bonjour <?= htmlspecialchars($_SESSION['user_name']) ?></span>
                    <a href="logout.php" class="btn btn-dark">Déconnexion</a>

                <?php else: ?>
                    <!-- Utilisateur normal connecté -->
                     <a href="index.php?action=trip_create" class="btn btn-dark">Créer un trajet</a>
                    <span class="me-2">Bonjour <?= htmlspecialchars($_SESSION['user_name']) ?></span>
                    <a href="index.php?action=logout" class="btn btn-dark">Déconnexion</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
