<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Changer le mot de passe</title>
    <link rel="stylesheet" href="../styles/login.css">
    <script src="TestPassword.js"></script>
</head>
<body>
    <div class="center">
        <form id="password-form" action="/../src/Controller/changePasswordController.php" method="post">
            <h2>Changer le mot de passe</h2>
            <p>Veuillez entrer votre identifiant.</p>
            <div class="colonne">
                <label for="identifiant">identifiant :</label>
                <input type="identifiant" id="identifiant" name="identifiant" required>
            </div>
            <p>Veuillez entrer votre nouveau mot de passe.</p>
            <div class="colonne">
                <label for="password">Nouveau mot de passe :</label>
                <input type="password" id="password" name="password" required>
                <div id="password-error" class="error-message"></div>
            </div>
            <div class="colonne">
                <label for="confirm-password">Confirmer le mot de passe :</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
            </div>
            <div class="ligne" id="vert">
                <input type="submit" value="Changer">
            </div>
        </form>
    </div>
</body>
</html>