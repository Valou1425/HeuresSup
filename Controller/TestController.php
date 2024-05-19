<?php
    
    // do all necessary includes first
    // __DIR__ allows you to use relative paths explicitly
    // for this test controller (i.e. a controller that is not calling the view, just to test the model)

    // require_once(__DIR__."/../Model/ConventionModel.php");
    // $conventionModel = new ConventionModel();
    // $result1 = $conventionModel->getHeureMax();
    // $jour = $result1['jour'];
    // $semaine = $result1['semaine'];
    // $mois = $result1['mois'];
    // print_r($jour);
    // print_r($semaine);
    // print_r($mois);
    

    // require_once(__DIR__."/../Model/BadgeModel.php");
    // $BadgeModel = new BadgeModel();
    // $date = "2024-05-18";
    // $id = 1;
    // //$result = $BadgeModel->Embaucher($id);
    // $result = $BadgeModel->checkEmbauche($id);

    $today = date('Y-m-d');
    $todayArray = explode("-", $today);
    $anneeActuel = $todayArray[0];
    $moisActuel = $todayArray[1];
    $jourActuel = $todayArray[2];
    $jourSemaineActuel = date("N", strtotime($today));

    print_r($jourSemaineActuel);

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
    // print_r($result5);
    // foreach ($result5 as $team) {
    //     echo('<p>'.$team['nom'].'</p>');
    // }


    // require_once(__DIR__."/../Model/UserModel.php");
    // $userModel = new UserModel();
    // $login = $_POST['identifiant'];
    // $password = $_POST['password'];
    // $connexion = $userModel->check_login($login, $password);
    // $id = $connexion['id'];
    // $name = $userModel->getFirstNameANDLastName($id);
    // print_r($name);


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


    



    // require_once(__DIR__."/../Model/HeureSupModel.php");
    // require_once(__DIR__."/../Model/UserModel.php");

    // $heureSupModel = new HeureSupModel();
    // $users = new UserModel();

    // $AllHeureSup = $heureSupModel->getAllHeureSup();
    // $AllUsersID = $users->getAllUsersID();

    // $heureTotal = 0;
    // foreach($AllUsersID as $u) {
    //     $userIDActuel = $u['id'];
    //     foreach($AllHeureSup as $h) {
    //         $heure = $h['nombre'];
    //         $userIDTeste = $h['id'];
    //         if ($userIDTeste == $userIDActuel) {
    //             $heureTotal += $heure;
    //         }
    //     }
    //     echo('<p>'.$heureTotal.'</p>');
    // }
