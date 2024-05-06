<?php
date_default_timezone_set('Europe/Paris'); // Ajustez selon votre fuseau horaire
$pdo = new PDO('mysql:host=localhost;dbname=heure_sup', 'root', '');
$date = date('Y-m-d');
$user_id = 1; // ID de l'utilisateur

// Vérifie si l'utilisateur a déjà débauché aujourd'hui
$stmt = $pdo->prepare("SELECT * FROM badge WHERE user_id = ? AND date = ? AND type = 0");
$stmt->execute([$user_id, $date]);
if ($stmt->rowCount() > 0) {
    echo json_encode(['message' => "Vous avez déjà enregistré une débauche aujourd'hui."]);
    exit;
}

// Vérifie si l'embauche a été enregistrée
$stmt = $pdo->prepare("SELECT * FROM badge WHERE user_id = ? AND date = ? AND type = 1");
$stmt->execute([$user_id, $date]);
if ($stmt->rowCount() == 0) {
    echo json_encode(['message' => "Aucune embauche enregistrée pour aujourd'hui. Impossible d'enregistrer la débauche."]);
    exit;
}

// Enregistre la débauche
$stmt = $pdo->prepare("INSERT INTO badge (user_id, date, heure_depart, type) VALUES (?, ?, NOW(), 0)");
$stmt->execute([$user_id, $date]);
echo json_encode(['message' => "Débauche enregistrée avec succès à ".date('H:i:s')]);
?>
