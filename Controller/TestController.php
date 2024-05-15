<?php
    
    // do all necessary includes first
    // __DIR__ allows you to use relative paths explicitly
    // for this test controller (i.e. a controller that is not calling the view, just to test the model)

    require_once(__DIR__."/../Model/ConventionModel.php");
    $conventionModel = new ConventionModel();
    $result1 = $conventionModel->getHeureMax();
    $jour = $result1['jour'];
    $semaine = $result1['semaine'];
    $mois = $result1['mois'];
    // print_r($jour);
    // print_r($semaine);
    // print_r($mois);
    

    // require_once(__DIR__."/../Model/HeureSupModel.php");
    // $HeureSupModel = new HeureSupModel();
    // $result2 = $HeureSupModel->getAllHeureSup();
    // $result3 = $HeureSupModel->getMyHeureSup();


    // require_once(__DIR__."/../Model/RoleModel.php");
    // $roleModel = new RoleModel();
    // $result4 = $roleModel->getRoleID('operateur');


    // require_once(__DIR__."/../Model/TeamModel.php");
    // $TeamModel = new TeamModel();
    // $result5 = $TeamModel->getAllTeams();
    // $result6 = $roleModel->getRoleID('operateur');


    // require_once(__DIR__."/../Model/UserModel.php");
    // $userModel = new UserModel();
    // // $login = $_POST['identifiant'];
    // // $password = $_POST['password'];
    // $login = '';
    // $password = '';
    // $result7 = $userModel->check_login($login, $password);
    // $result8 = $userModel->getUserID($userID);

    // //print_r($result);

    // echo('<ul>');
    // $n = 8;
    // for($i = 0; $i < $n; $i++ ) {
    //     echo('<li>'.$result.$i.'<li>');
    // }    
    // echo('</ul>');
