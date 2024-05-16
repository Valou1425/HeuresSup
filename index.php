<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="Vue/Styles/Login.css"> 
        <link rel="stylesheet" href="Vue/Styles/notification.css"> 
        <title>Document</title>
    </head>
    <body>
        <?php
        if (isset($_GET['connect'])) {
            echo('<p id="notification">identifiant ou mot de passe incorect</p>');
        }
        ?>
        <main class="center">
            <form action="./Controller/loginController.php" method="post">
                <fieldset>
                    <h2>Connexion</h2>
                    <p>Entrez vos informations ici</p>
                    <p class="colonne">
                        <label for="identifiant" class="bold">identifiant</label> 
                        <input id="identifiant" name="identifiant" type="text"  placeholder="xxx@xxx.xx">
                    </p>
                    <p class="colonne">
                        <div class="ligne">
                            <label for="password" class="bold">mot de passe</label> 
                            <a href="./Vue/LoginTools/ChangerMotDePasse.php" ><span id="SpanForm1">mot de passe oublié?</span></a>
                        </div>
                        <input id="password" name="password" type="password">
                    </p>
                    <input id="vert" type="submit" value="connexion"> 
                </fieldset>
            </form>

        </main>
    </body>
</html>