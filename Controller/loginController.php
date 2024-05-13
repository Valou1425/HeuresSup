<?php

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
require_once(__DIR__."/../Model/model.php");

$query = 'SELECT password, login FROM user';
$data = RequeteSQL($query);
$inputLogin = $_POST['identifiant'];
$inputPassword = $_POST['password'];

header("location: ../index.php?state=1");
exit;

?>