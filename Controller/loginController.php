<?php

/**
 * On ne traite pas les super globales provenant de l'utilisateur directement,
 * ces données doivent être testées et vérifiées.
 */
require_once(__DIR__."/../Model/UserModel.php");

$inputLogin = $_POST['identifiant'];
$inputPassword = $_POST['password'];

$userModel = new UserModel();
$connexion = $userModel->check_login($inputLogin, $inputPassword);

if($connexion == null) {
    header("location: ../index.php?connect=0");
    echo('<div id="notification">mot de passe incorrect<div>');
    exit;
} else {
    header("location: ../Vue/Pointeuse.php");
    exit;
}

