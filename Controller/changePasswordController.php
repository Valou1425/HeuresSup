<?php

require_once(__DIR__."/../Model/UserModel.php");

$password = $_POST['password'];
$login = $_POST['identifiant'];

$userModel = new UserModel();
$userModel->ChangePassword($password, $login);

header("location: ../index.php?connect=1");
exit;