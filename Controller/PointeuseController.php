<?php

require_once(__DIR__."/../Model/BadgeModel.php");

$action = $_GET['action'];
$userID = json_decode(file_get_contents('php://input'))->userID;

$badgeModel = new BadgeModel();

if ($action == 'embauche') {
    $response = $badgeModel->embaucher($userID);
} elseif ($action == 'debauche') {
    $response = $badgeModel->debaucher($userID);
}

echo json_encode(['message' => $response[0]]);
?>