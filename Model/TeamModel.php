<?php

require_once("DBModel.php");

class TeamModel extends DBModel {

    function getAllTeams() {

        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT * FROM equipe";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entries = $statement->fetchAll();

        foreach ($entries as $entry) {
            $equipe = array(
                "nom" => $entry['nom'],
                "id" => $entry['id']
            );
            $result[] = $equipe;
        }
        return $result;

    }
    
    function getTeamMembers($teamID) {
        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT firstname, lastname, id FROM user WHERE equipe_id = '$teamID'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entries = $statement->fetchAll();

        foreach ($entries as $entry) {
            $team = array(
                "firstname" => $entry['firstname'],
                "lastname" => $entry['lastname'],
                "id" => $entry['id']
            );
            $result[] = $team;
        }
        return $result;
    }

    function getTeamID(string $team) {
        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT id FROM equipe WHERE nom = '$team'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entry = $statement->fetch();

        if ($entry) {
            return $entry['id']; // Retourne l'ID du rôle s'il est trouvé
        } else {
            return null; // Retourne null si aucun résultat n'est trouvé
        }

    }

    function getTeam(int $id) {
        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT nom FROM equipe WHERE id = '$id'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entry = $statement->fetch();

        if ($entry) {
            return $entry['nom']; // Retourne l'ID du rôle s'il est trouvé
        } else {
            return null; // Retourne null si aucun résultat n'est trouvé
        }
        
    }

}