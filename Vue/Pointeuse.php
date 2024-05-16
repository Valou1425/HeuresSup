<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Système de Pointage</title>
    <link rel="stylesheet" href="Styles/Pointeuse.css">
</head>
<body>
    <div class="header">
        <h2>Cliquer sur un des deux boutons</h2>
    </div>
    <div class="button-container">
        <button id="embauche" onclick="registerTime('embauche')">Embauche</button>
        <button id="debauche" onclick="registerTime('debauche')">Débauche</button>
    </div>
    <script src="scripts.js"></script>

    <?php

    $role = $_GET['role'];
    $team = $_GET['team'];

    if ($role == "responsable") {
        //require_once(__DIR__."/../controller/ajoutHeureController.php");
        echo('<a href="Patron/ListeTravailleur.php?team='.$team.'">Consulter les heures sup de mes employés</a>');
    } elseif ($role == "RH") {
        echo('<a href="RH/NouvelUtilisateur.php">Ajouter un nouvel utilisateur</a>');
    }
    ?>

</body>
</html>