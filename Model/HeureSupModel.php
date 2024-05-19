<?php

require_once("DBModel.php");

class HeureSupModel extends DBModel {

    function getMyTeamHeureSup(int $usereID) {

        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT * FROM heure_sup WHERE user_id = $userID";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entries = $statement->fetchAll();

        foreach ($entries as $entry) {
            $heureSup = array(
                "id" => $entry['id'],
                "ajout_perso" => $entry['ajout_perso'],
                "heure_sup" => $entry['heure_sup'],
                "date" => $entry['date'],
                "user_id" => $entry['user_id']
            );
            $result[] = $heureSup;
        }
        return $result;

    }

    function getMyHeureSup(int $userID) {

        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT * FROM heure_sup WHERE user_id = $userID ORDER BY date ASC";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entries = $statement->fetchAll();

        foreach ($entries as $entry) {
            $heureSup = array(
                "id" => $entry['id'],
                "ajout_perso" => $entry['ajout_perso'],
                "heures_sup" => $entry['heures_sup'],
                "date" => $entry['date'],
                "user_id" => $entry['user_id']
            );
            $result[] = $heureSup;
        }
        return $result;

    }

    function ajouterHeureSup(bool $ajoutPerso, int $nombre, string $date, int $userID) {

        if (!$this->connected) {
            return $result;
        }
        // $requete = "INSERT INTO heure_sup (ajout_perso, heures_sup, date, user_id) VALUES ($ajoutPerso, $nombre, '$date', $userID)";
        // $stmt = $this->db->prepare($requete);
        // $stmt->execute();

        $requete = "INSERT INTO heure_sup (ajout_perso, heures_sup, date, user_id) VALUES (:ajoutPerso, :nombre, :today, :userID)";
        $stmt = $this->db->prepare($requete);

        // Lier les valeurs aux placeholders
        $stmt->bindValue(':ajoutPerso', $ajoutPerso, PDO::PARAM_BOOL);
        $stmt->bindValue(':nombre', $nombre, PDO::PARAM_INT);
        $stmt->bindValue(':today', $date, PDO::PARAM_STR);
        $stmt->bindValue(':userID', $userID, PDO::PARAM_INT);

        // Exécuter la requête
        $stmt->execute();
        return 1;

    }

}