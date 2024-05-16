<?php

require_once("DBModel.php");

class HeureSupModel extends DBModel {

    function getAllHeureSup() {

        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT * FROM heure_sup";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entries = $statement->fetchAll();

        foreach ($entries as $entry) {
            $heureSup = array(
                "id" => $entry['id'],
                "ajout_perso" => $entry['ajout_perso'],
                "nombre" => $entry['heure_sup'],
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
        $requete = "SELECT * FROM heure_sup WHERE user_id = '$userID'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entries = $statement->fetchAll();

        foreach ($entries as $entry) {
            $heureSup = array(
                "id" => $entry['id'],
                "ajout_perso" => $entry['ajout_perso'],
                "nombre" => $entry['heure_sup'],
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
        $requete = "INSERT INTO heure_sup (ajout_perso, heure_sup, date, user_id) VALUES ($ajoutPerso, $nombre, CURDATE(), $userID)";
        $stmt = $this->$db->prepare($requete);
        $stmt->execute();

    }

}