<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulaire de connexion</title>
        <link rel="stylesheet" href="/public/login.css">
    </head>
    <body>
        <main>
            <div class="container">
                <form action="/login" method="POST" class="formulaire">
                    <fieldset>
                        <legend>Connexion</legend>

                        <label for="email">Adresse e-mail</label>
                        <input type="email" name="email" id="email" required><br><br>

                        <label for="password">Mot de passe</label>
                        <input type="password" name="password" id="password" required><br><br>

                        <input type="submit" value="Se connecter">
                    </fieldset>>
                </form>
            </div>
        </main>
    </body>
</html>