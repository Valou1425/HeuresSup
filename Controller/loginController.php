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
    exit;
} else {
    $firstname = $connexion['firstname'];
    $lastname = $connexion['lastname'];
    $id = $connexion['id'];

    $teamID = $userModel->getTeamID($id);
    $roleID = $userModel->getRoleID($id);

    require_once(__DIR__."/../Model/RoleModel.php");
    require_once(__DIR__."/../Model/TeamModel.php");

    $roleModel = new RoleModel();
    $role = $roleModel->getRole($roleID);

    $teamModel = new TeamModel();
    $team = $teamModel->getTeam($teamID);

    header("location: ../Vue/Pointeuse.php?role=".$role."&team=".$team."&firstname=".$firstname."&lastname=".$lastname);
    exit;

}

