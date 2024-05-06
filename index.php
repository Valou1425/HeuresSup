<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css"> 
        <link rel="stylesheet" href="styles/desktop.css" media="screen and (min-width: 768px)"> 
        <link rel="stylesheet" href="styles/mobile.css" media="screen and (max-width: 767px)"> 
        <link rel="shortcut icon" href="media/pictures/favicon.png">
        <title>Document</title>
    </head>
    <body>
        <main class="center">
            <form action="./Controller/TestController.php" method="post">
                <fieldset>
                    <p class="colonne">
                        <label for="identifiant" class="bold">identifiant</label> 
                        <input id="identifiant" name="identifiant" type="text"  placeholder="xxx@xxx.xx">
                    </p>
                    <p class="colonne">
                        <div class="ligne">
                            <label for="password" class="bold">mot de passe</label> 
                            <a href="./en-cours.html" ><span id="SpanForm1">mot de passe oublié?</span></a>
                        </div>
                        <input id="password" name="password" type="password">
                    </p>
                    <input id="vert" type="submit" value="connexion"> 
                </fieldset>
            </form>

            <p><a href="./Vue/RH/NouvelUtilisateur.php"><span>Créer un compte</span></a></p>

        </main>
    </body>
</html>