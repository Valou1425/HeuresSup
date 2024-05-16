<?php

require_once(__DIR__."/../Model/UserModel.php");
require_once(__DIR__."/../Model/TeamModel.php");
require_once(__DIR__."/../Model/RoleModel.php");

$userModel = new UserModel();
$teamModel = new TeamModel();
$roleModel = new RoleModel();

$inputFirstName = $_POST['firstname'];
$inputlastName = $_POST['lastname'];
$inputLogin = $_POST['identifiant'];
$inputPassword = $_POST['password'];

$inputTeam = $_POST['team'];
$teamId = $teamModel->getTeamID($inputTeam);
$inputRole = $_POST['role'];
$roleId = $roleModel->getRoleID($inputRole);

$notNull = false;
$notEmpty = false;

if ($inputFirstName == null ) {
    header("location: ../Vue/RH/NouvelUtilisateur.php?result=0");
    exit;
} elseif ($inputlastName == null) {
    header("location: ../Vue/RH/NouvelUtilisateur.php?result=0");
    exit;
} elseif ($inputLogin == null) {
    header("location: ../Vue/RH/NouvelUtilisateur.php?result=0");
    exit;
}elseif ($inputPassword == null) {
    header("location: ../Vue/RH/NouvelUtilisateur.php?result=0");
    exit;
}elseif ($inputTeam == null) {
    header("location: ../Vue/RH/NouvelUtilisateur.php?result=0");
    exit;
}elseif ($inputRole == null) {
    header("location: ../Vue/RH/NouvelUtilisateur.php?result=0");
    exit;
} else {
    $notNull = true;
}

if (strlen($inputFirstName)<3) {
    echo('<p>'.strlen($inputFirstName).'</p>');
    header("location: ../Vue/RH/NouvelUtilisateur.php?result=1");
    exit;
} elseif (strlen($inputlastName)<3) {
    echo('<p>'.strlen($inputlastName).'</p>');
    header("location: ../Vue/RH/NouvelUtilisateur.php?result=1");
    exit;
} elseif (strlen($inputLogin)<3) {
    echo('<p>'.strlen($inputLogin).'</p>');
    header("location: ../Vue/RH/NouvelUtilisateur.php?result=1");
    exit;
}elseif (strlen($inputPassword)<3) {
    echo('<p>'.strlen($inputPassword).'</p>');
    header("location: ../Vue/RH/NouvelUtilisateur.php?result=1");
    exit;
} else {
    $notEmpty = true;
}


if($notNull) {
    if($notEmpty) {
        //$userModel->new_user($inputFirstName, $inputlastName, $inputLogin, $inputPassword, $roleId, $teamId);
        header("location: ../Vue/RH/NouvelUtilisateur.php?result=2");
        exit;
    }
}

