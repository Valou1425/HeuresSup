<?php

require_once(__DIR__."/../Model/HeureSupModel.php");
require_once(__DIR__."/../Model/UserModel.php");

$heureSupModel = new HeureSupModel();
$users = new UserModel();

$AllHeureSup = $heureSupModel->getAllHeureSup();
$AllUsersID = $users->getAllUsersID();

$heureTotal = 0;
foreach($ALLUsersID as $u) {
    $userIDActuel = $u['id'];
    foreach($AllHeureSup as $h) {
        $heure = $h['nombre'];
        $userIDTeste = $h['id'];
        if ($userIDTeste == $userIDActuel) {
            $heureTotal += $heure;
        }
    }
    echo('<p>'.$heureTotal.'</p>');
}

