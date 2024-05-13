<?php

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
require_once(__DIR__."/../Model/UserModel.php");

$inputLogin = $_POST['identifiant'];
$inputPassword = $_POST['password'];

$userModel = new UserModel();
$result = $userModel->check_login($inputLogin, $inputPassword);

header("location: ../Vue/RH/NouvelUtilisateur.php");
exit;

// if($result == null) {
//     header("location: ../index.php");
//     echo('<div id="notification">mot de passe incorrect<div>');
//     exit;
// } else {
//     header("location: ../Vue/Pointeuse.php");
//     exit;
// }

?>