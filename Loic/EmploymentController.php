<?php

class EmploymentController {

    public function embaucher() {
        global $conn;
        $user_id = 1; // Exemple d'ID utilisateur
        $today = date('Y-m-d');
        $now = date('Y-m-d H:i:s');

        // Vérifier si l'utilisateur a déjà embauché aujourd'hui
        $check = $conn->query("SELECT * FROM badge WHERE user_id = $user_id AND date = '$today'");
        if ($check->num_rows > 0) {
            return ["Vous avez déjà embauché aujourd'hui.", "negative"];
        } else {
            // Insérer l'embauche et mettre le type à 1
            $conn->query("INSERT INTO badge (user_id, date, heure, type) VALUES ($user_id, '$today', '$now', b'1')");
            return ["Embauche enregistrée avec succès à $now", "positive"];
        }
    }

    public function debaucher() {
        global $conn;
        $user_id = 1; // Exemple d'ID utilisateur
        $today = date('Y-m-d');
        $now = date('Y-m-d H:i:s');

        // Vérifier si l'utilisateur a embauché et n'a pas encore débauché
        $check = $conn->query("SELECT * FROM badge WHERE user_id = $user_id AND date = '$today' AND type = b'1'");
        if ($check->num_rows == 0) {
            return ["Vous n'avez pas encore embauché aujourd'hui ou avez déjà débauché.", "negative"];
        } else {
            $row = $check->fetch_assoc();
            $heure_embauche = new DateTime($row['heure']);
            $heure_debauche = new DateTime($now);

            // Calculer les minutes travaillées
            $minutesWorked = ($heure_embauche->diff($heure_debauche)->h * 60) + $heure_embauche->diff($heure_debauche)->i;

            // Déterminer les heures supplémentaires (minutes dans ce cas)
            $minutes_sup = max(0, $minutesWorked - 1); // Tout au-delà d'une minute est considéré comme supplémentaire

            // Mettre à jour l'heure de débauche et mettre le type à 0
            $conn->query("UPDATE badge SET heure_depart = '$now', type = b'0' WHERE user_id = $user_id AND date = '$today'");
            // Stocker les heures supplémentaires
            $conn->query("INSERT INTO heure_sup (ajout_perso, heures_sup, date, user_id) VALUES (b'1', $minutes_sup, '$today', $user_id)");

            return ["Débauche enregistrée avec succès à $now, minutes supplémentaires: $minutes_sup minute(s)", "positive"];
        }
    }
}
?>
