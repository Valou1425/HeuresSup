<?php
include 'db.php'; // Assurez-vous que ce fichier contient les paramètres de connexion à la BDD

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST['userId'];
    $hours = $_POST['hours'];
    $date = $_POST['date'];

    // Votre requête SQL pour ajouter les heures, exemple :
    $sql = "INSERT INTO heure_sup (user_id, heures_sup, date) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iis", $userId, $hours, $date);
    if ($stmt->execute()) {
        echo "Heures ajoutées avec succès.";
    } else {
        echo "Erreur lors de l'ajout des heures.";
    }
    $stmt->close();
    $conn->close();
}
