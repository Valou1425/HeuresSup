<?php
date_default_timezone_set('Europe/Paris'); // Ajustez selon votre fuseau horaire

$pdo = new PDO('mysql:host=localhost;dbname=heure_sup', 'root', '');
$date = date('Y-m-d');
$user_id = 1; // ID de l'utilisateur, à personnaliser selon votre système d'authentification

// Vérifie si l'utilisateur a déjà embauché aujourd'hui
$stmt = $pdo->prepare("SELECT * FROM badge WHERE user_id = ? AND date = ? AND type = 1");
$stmt->execute([$user_id, $date]);
if ($stmt->rowCount() > 0) {
    echo json_encode(['message' => "Vous avez déjà enregistré une embauche aujourd'hui."]);
    exit;
}

// Enregistre l'embauche
$stmt = $pdo->prepare("INSERT INTO badge (user_id, date, heure_arrive, type) VALUES (?, ?, NOW(), 1)");
$stmt->execute([$user_id, $date]);
echo json_encode(['message' => "Embauche enregistrée avec succès à ".date('H:i:s')]);
?>
