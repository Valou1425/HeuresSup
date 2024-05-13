<?php

require_once(__DIR__."/../Model/TeamModel.php");

$teamModel = new TeamModel();

$teams = $teamModel->getAllTeams();

echo('<h1>Titre<h1>');
print_r($teams);