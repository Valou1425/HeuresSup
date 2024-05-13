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

if($result == null) {
    header("location: ../index.php?state=1");
    exit;
} else {
    header("location: ../Pointeuse.php");
    exit;
}


header("location: ../index.php?state=1");
exit;

?>