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
            <form action="./../../Controller/NewAccountController.php" method="post">
                <fieldset>
                    <p class="colonne">
                        <label for="firstname" class="bold">Nom</label> 
                        <input id="firstname" name="firstname" type="text">
                    </p>
                    <p class="colonne">
                        <label for="lastname" class="bold">Prénom</label> 
                        <input id="lastname" name="lastname" type="text">
                    </p>
                    <p class="colonne">
                        <label for="identifiant" class="bold">identifiant</label> 
                        <input id="identifiant" name="identifiant" type="text"  placeholder="xxx@xxx.xx">
                    </p>
                    <p class="colonne">
                        <label for="password" class="bold">mot de passe</label> 
                        <input id="password" name="password" type="password">
                    </p>
                    <p>
                        <label for="team">Choisissez l'équipe dans laquelle cet employé travaillera</label><br>
                        <select name="team" id="team">
                            <?php
                            require_once(__DIR__."/../../Controller/TeamController.php");
                            foreach ($teams as $team) {
                                echo('<option value="'.$team.'">'.$team.'</option>');
                            }
                            ?>
                        </select>
                    </p>
                    <p>
                        <label for="role">Choisissez le rôle de l'employé au sein de cette équipe</label><br>
                        <select name="role" id="role">
                            <?php
                            require_once(__DIR__."/../../Controller/RoleController.php");
                            foreach ($roles as $role) {
                                echo('<option value="'.$role.'">'.$role.'</option>');
                            }
                            ?>
                        </select>
                    </p>
                    <input id="vert" type="submit" value="connexion">
                </fieldset>
            </form>

            <p><a href="./index.php"><span>Créer un compte</span></a></p>

        </main>
    </body>
</html>