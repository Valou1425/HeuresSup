<?php

require_once(__DIR__."/../Model/HeureSupModel.php");
require_once(__DIR__."/../Model/UserModel.php");
require_once(__DIR__."/../Model/TeamModel.php");

$teamModel = new TeamModel();
$teamName = $_GET['team'];
$TeamID = $teamModel->getTeamID($teamName);
$MyTeam = $teamModel->getTeamMembers($TeamID);

// foreach($MyTeam as $t) {
//     echo('<p>'.$t['id'].'</p>');
//     echo('<p>'.$t['firstname'].'</p>');
//     echo('<p>'.$t['lastname'].'</p>');
// }

$heureSupModel = new HeureSupModel();
$users = new UserModel();
$AllHeureSup = $heureSupModel->getAllHeureSup(); 


ob_start();
foreach($MyTeam as $user) {
    $heureTotal = 0;
    $userIDActuel = $user['id'];
    foreach($AllHeureSup as $h) {
        $heure = $h['nombre'];
        $userIDTeste = $h['id'];
        if ($userIDTeste == $userIDActuel) {
            $heureTotal += $heure;
        }
    }
    echo "<div class='user-card'>
    <p>" . htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']) . "</p>
                    <button class='button button-add' onclick='showModal(" . $user['id'] . ")'>Ajouter</button>
                    <div id='modal" . $user['id'] . "' class='modal hidden'>
                        <div class='modal-content'>
                            <span class='close' onclick='closeModal(" . $user['id'] . ")'>&times;</span>
                            <form method='POST' action='addHours.php'>
                                <input type='hidden' name='userId' value='" . $user['id'] . "'>
                                <input type='number' name='hours' placeholder='Heures supplémentaires' min='1' required>
                                <input type='date' name='date' required>
                                <button type='submit' class='button button-add'>Soumettre</button>
                            </form>
                        </div>
                    </div>
                    <button class='button button-delete'>Supprimer</button>
                    </div>";
}
$content = ob_get_clean();

require_once(__DIR__."/../Vue/Patron/ListeTravailleur.php");

