<?php

require_once(__DIR__."/../Model/HeureSupModel.php");
require_once(__DIR__."/../Model/TeamModel.php");
require_once(__DIR__."/../Model/ConventionModel.php");

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

$conventionModel = new ConventionModel();
$heureConvention = $conventionModel->getHeureMax();
$heureMaxJour = $heureConvention['jour'];
$heureMaxSemaine = $heureConvention['semaine'];
$heureMaxMois = $heureConvention['mois'];

$today = date('Y-m-d');
$todayArray = explode("-", $today);
$anneeActuel = $todayArray[0];
$moisActuel = $todayArray[1];
$jourActuel = $todayArray[2];
$IntJourActuel = intval($jourActuel);
$jourSemaineActuel = date("N", strtotime($today)); // renvoie un numéro de 1 à 7 correspondant au jour de la semaine (lundi, mardi ...)

ob_start();
foreach($MyTeam as $user) {
    $heureTotalSemaine = 0;
    $heureTotalMois = 0;
    $userIDActuel = $user['id'];
    $HeureSupUtilisateurActuel = $heureSupModel->getMyHeureSup($userIDActuel);
    foreach($HeureSupUtilisateurActuel as $h) {
        $heureSup = $h['heures_sup'];
        $date = $h['date'];
        $dateArray = explode("-", $date);
        $anneeHSup = $dateArray[0];
        $moisHSup = $dateArray[1];
        $jourHSup = $dateArray[2];
        $IntJourHSup = intval($jourHSup);
        $jourSemaineHSup = date("N", strtotime($date)); // renvoie un numéro de 1 à 7 correspondant au jour de la semaine (lundi, mardi ...)

        // calcul des heures sup effectués cette semaine et ce mois ci
        if ($anneeActuel == $anneeHSup) {
            if ($moisActuel == $moisHSup) {

                $EcartJour = $IntJourActuel - $IntJourHSup; // calcul depuis combien de temps en jour l'heure sup a été effectuée

                if ($EcartJour < 7) { //si ça fait moins d'une semaine 
                    if ($jourSemaineActuel >= $jourSemaineHSup){ // et que c'est la même semaine 
                        $heureTotalSemaine += $heureSup;
                        $heureTotalMois += $heureSup;
                    } else {
                        $heureTotalMois += $heureSup;
                    }
                } else {
                    $heureTotalMois += $heureSup;
                }
            }
        }
    }
    // détermine combien d'heure max peuve être donnée en fonction des heures fixés par la convention générale
    $heuresRestanteSemaine = $heureMaxSemaine - $heureTotalSemaine;
    $heuresRestanteMois = $heureMaxMois - $heureTotalMois;
    $max = min($heuresRestanteMois, $heuresRestanteSemaine ,$heureMaxJour);

    echo "<div class='user-card'>
    <p>" . htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']) ."</p>
    <p>heure(s) sup effectués cette semaine : ". $heureTotalSemaine."</p>
    <p>heure(s) sup effectués ce mois ci : ". $heureTotalMois."</p>
                    <button class='button button-add' onclick='showModal(" . $user['id'] . ")'>Ajouter</button>
                    <div id='modal" . $user['id'] . "' class='modal hidden'>
                        <div class='modal-content'>
                            <span class='close' onclick='closeModal(" . $user['id'] . ")'>&times;</span>
                            <form method='POST' action='/../src/Controller/ajoutHeureController.php?role=".$role."&team=".$team."&firstname=".$firstname."&lastname=".$lastname."'>
                                <p>" . htmlspecialchars($user['firstname']) . " " . htmlspecialchars($user['lastname']) ."</p>
                                <input type='hidden' name='userId' value='" . $user['id'] . "'>
                                <input type='number' name='hours' placeholder='Heures supplémentaires' min='1' max='".$max."' required>
                                <input type='date' name='date' required>
                                <button type='submit' class='button button-add'>Soumettre</button>
                            </form>
                        </div>
                    </div>
                    </div>";
}
$content = ob_get_clean();

require_once(__DIR__."/../Vue/Patron/ListeTravailleur.php");

