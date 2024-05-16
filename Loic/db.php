<?php
$servername = "localhost";
$username = "root";
$password = "";  // Pas de mot de passe pour root
$dbname = "heure_sup";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
