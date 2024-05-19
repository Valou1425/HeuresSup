<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système de Pointage</title>
    <link rel="stylesheet" href="Styles/Pointeuse.css">
</head>
<body>
    <?php
    $firstname = $_GET['firstname'];
    $lastname = $_GET['lastname'];
    $role = $_GET['role'];
    $team = $_GET['team'];
    require_once(__DIR__."/../Controller/PointeuseController.php");
    ?>
    <header>
        <input id="deconnexion" class="button" type="button" onclick="window.location.href='/../src/index.php';" value="Se déconnecter"> 
    </header>
    <div class="container">
        <div class="button-container">
            <h2>Cliquer sur l'un des boutons</h2>
            <form method="post">
                <button id="embauche" type="submit" name="embauche" class="button button-embauche">Embauche</button>
                <button id="debauche" type="submit" name="debauche" class="button button-debauche">Débauche</button>
            </form>
        </div>
    </div>

    <?= $content ?>

</body>
</html>