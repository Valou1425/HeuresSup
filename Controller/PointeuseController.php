<?php

require_once(__DIR__."/../Model/BadgeModel.php");
require_once(__DIR__."/../Model/UserModel.php");
require_once(__DIR__."/../Model/HeureSupModel.php");

$badgeModel = new BadgeModel();
$userModel = new UserModel();
$heureSupModel = new HeureSupModel();

// affichage de la notification d'information après avoir cliqué sur le bouton embauche ou debauche
$message = '';
$alertClass = '';
$userID = $userModel->getUserId($firstname, $lastname);

if (isset($_POST['embauche'])) {
    list($message, $type) = $badgeModel->embaucher($userID);
    $alertClass = $type == "negative" ? 'alert-negative' : 'alert-positive';
}
if (isset($_POST['debauche'])) {
    list($message, $type) = $badgeModel->debaucher($userID);
    $alertClass = $type == "negative" ? 'alert-negative' : 'alert-positive';
}
if ($message !== '') {
    echo "<div class=\"$alertClass\">$message</div>";
}



$myHeureSup = $heureSupModel->getMyHeureSup($userID);

ob_start();

// affiche des boutons en fonction du profil de l'utilisateur
if ($role == "responsable") {
    echo('<a href="Patron/ListeTravailleur.php?role='.$role.'&team='.$team.'&firstname='.$firstname.'&lastname='.$lastname.'">Consulter les heures sup de mes employés</a>');
} elseif ($role == "RH") {
    echo('<a href="RH/NouvelUtilisateur.php?role='.$role.'&team='.$team.'&firstname='.$firstname.'&lastname='.$lastname.'">Ajouter un nouvel utilisateur</a>');
}

echo("<h3 class='center'>Mes Heures Supp </h2>
        <div class='heureSup'>");

// affiche l'historique des heures sup de l'utilisateur
foreach($myHeureSup as $h) {

    $heureSup = $h['heures_sup'];
    $date = $h['date'];
    $Demande = $h['ajout_perso'];
    if ($Demande == 1) {
        $Demandeur = "vous";
    }else {
        $Demandeur = "votre hierarchie";
    }

    echo "
        <div class='heure'>
            <table>
                <tr class='titre'>
                    <td> à l'initiative de </td><td>Nombre d'heure </td><td>Date</td>
                </tr>
                <tr>
                    <td>".$Demandeur."</td><td>".$heureSup."</td><td>".$date."</td>
                </tr>
            </table>
        </div>
    </div>";
}

$content = ob_get_clean();

?>