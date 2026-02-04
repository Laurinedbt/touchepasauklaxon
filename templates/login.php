<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire de connexion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    </head>
    <body>
        <main>
            <div class="container">
                <?php if (isset($_GET['error'])): ?>
                    <p style="color:red;">Identifiants incorrects, veuillez réessayer.</p>
                <?php endif; ?>
                
                <div class="d-flex justify-content-center align-items-center vh-100">
                    <form action="index.php?action=login" method="POST">
                    <fieldset>
                        <legend class="py-3"><strong>Connexion</strong></legend>

                        <label for="mail">Adresse e-mail</label>
                        <input type="mail" name="mail" id="mail" class="mx-2" required><br><br>

                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" class="mx-2" required><br><br>

                        <input type="submit" value="Se connecter" class="btn btn-dark my-3">
                    </fieldset>
                </form>
                </div>
            </div>
        </main>
    </body>
</html>