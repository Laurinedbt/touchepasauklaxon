<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Modifier une agence</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="../public/style.css">
    </head>
    <body>
        <main>
            <h1>Modifier une agence</h1>

            <form method="POST" action="index.php?action=admin_agence_edit">
                <input type="hidden" name="id" value="<?= (int)$agence['id'] ?>">

                <label class="form-label">Nom ville/agence</label>
                <input type="text" name="nom_ville" class="form-control" required
                    value="<?= htmlspecialchars($agence['nom_ville']) ?>">

                <button class="btn btn-dark my-3">Enregistrer</button>
                <a href="index.php?action=admin_agences" class="btn btn-secondary my-3">Annuler</a>
            </form>
        </main>
        <footer class="d-flex justify-content-center">
            <div><p>&copy; 2026 - MVC PHP</p></div>
        </footer>
    </body>
</html>
