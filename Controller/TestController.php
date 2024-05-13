<?php
    
    // do all necessary includes first
    // __DIR__ allows you to use relative paths explicitly
    // for this test controller (i.e. a controller that is not calling the view, just to test the model)
    require_once(__DIR__."/../Model/UserModel.php");

    // $userModel = new UserModel();

    // $login = $_POST['identifiant'];
    // $password = $_POST['password'];
    
    // $result = $userModel->check_login($login, $password);

    // require_once(__DIR__."/../Model/ConventionModel.php");
    // $conventionModel = new ConventionModel();
    //$result = $conventionModel->getHeureMax();


    // require_once(__DIR__."/../Model/RoleModel.php");
    // $roleModel = new RoleModel();
    // $result = $roleModel->getAllRoles();

    require_once(__DIR__."/../Model/TeamModel.php");
    $TeamModel = new TeamModel();
    $result = $TeamModel->getAllTeams();

    print_r($result);

    // $result2 = $roleModel->getRoleID('operateur');

    // print_r($result2);