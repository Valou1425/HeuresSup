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
$teamId = $teamModel->getTeam($inputTeam);
$inputPassword = $_POST['role'];
$roleId = $roleModel->getRole($inputRole);

$userModel->new_user($inputFirstName, $inputlastName, $inputLogin, $inputPassword, $roleId, $teamId);