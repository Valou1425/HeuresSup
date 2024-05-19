<?php

require_once(__DIR__."/../Model/UserModel.php");
require_once(__DIR__."/../Model/TeamModel.php");
require_once(__DIR__."/../Model/RoleModel.php");

$team = $_GET['team'];
$role = $_GET['role'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];

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
    $result=0;
} elseif ($inputlastName == null) {
    $result=0;
} elseif ($inputLogin == null) {
    $result=0;
}elseif ($inputPassword == null) {
    $result=0;
}elseif ($inputTeam == null) {
    $result=0;
}elseif ($inputRole == null) {
    $result=0;
} else {
    $notNull = true;
}

if (strlen($inputFirstName)<3) {
    $result=1;
} elseif (strlen($inputlastName)<3) {
    $result=1;
} elseif (strlen($inputLogin)<3) {
    $result=1;
}elseif (strlen($inputPassword)<3) {
    $result=1;
} else {
    $notEmpty = true;
}


if($notNull) {
    if($notEmpty) {
        $result = 2;
    }
}

header("location: ../Vue/RH/NouvelUtilisateur.php?result=".$result."&firstname=".$firstname."&lastname=".$lastname."&role=".$role."&team=".$team);
exit;

