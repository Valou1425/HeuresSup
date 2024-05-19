<?php

require_once(__DIR__."/../Model/HeureSupModel.php");

$heureSupModel = new HeureSupModel();

$nombre = $_POST['hours'];
$date = $_POST['date'];
$userID = $_POST['userId'];

$result = $heureSupModel->ajouterHeureSup(0, $nombre, $date, $userID);

$team = $_GET['team'];
$role = $_GET['role'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];

header("location: ../Vue/Patron/ListeTravailleur.php?role=".$role."&team=".$team."&firstname=".$firstname."&lastname=".$lastname."&result=".$result);
exit;
