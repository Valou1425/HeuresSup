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

$userModel->new_user($inputFirstName, $inputlastName, $inputLogin, $inputPassword, $roleId, $teamId);