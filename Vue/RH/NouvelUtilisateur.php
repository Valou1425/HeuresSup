<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../Styles/login.css"> 
        <link rel="stylesheet" href="../Styles/notification.css"> 
        <title>Document</title>
    </head>
    <body>
        <?php
        $team = $_GET['team'];
        $role = $_GET['role'];
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];

        if (isset($_GET['result'])) {
            $result = $_GET['result'];
            if ($result==0) {
                echo('<p id="notification">Veuillez remplir tous les champs</p>');
            }elseif ($result==1) {
                echo('<p id="notification">Veuillez mettre au moins trois caractères par champ</p>');
            } else {
                echo('<p id="notification">Le nouveau compte a bien été créé</p>');
            }
        }
        ?>
        <header>
            <a href="/../src/Vue/Pointeuse.php?role=<?= $role ?>&team=<?=$team?>&firstname=<?=$firstname?>&lastname=<?=$lastname?>">
                <img id="homeIcon" alt="homeIcon" src="/../src/Vue/media/home.png">
            </a>
        </header>
        <main class="center">
            <form action="./../../Controller/NewAccountController.php?role=<?= $role ?>&team=<?=$team?>&firstname=<?=$firstname?>&lastname=<?=$lastname?>" method="post">
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
                                echo('<option value="'.$team['nom'].'">'.$team['nom'].'</option>');
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
                                echo('<option value="'.$role['role'].'">'.$role['role'].'</option>');
                            }
                            ?>
                        </select>
                    </p>
                    <input id="vert" type="submit" value="Créer le compte">
                </fieldset>
            </form>

        </main>
    </body>
</html>