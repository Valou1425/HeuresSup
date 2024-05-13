<?php

require_once(__DIR__."/../Model/TeamModel.php");

$teamModel = new TeamModel();

$Teams = $teamModel->getAllTeams();