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
            $result["equipe"] = $entry['equipe'];
            $result["id"] = $entry['id'];
        }
        return $result;
    }

    function getTeamID(string $team) {
        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requeteEquipe = "SELECT id FROM equipe WHERE nom = $team";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entry = $statement->fetchAll();

        $result = $entry;
        return $result;
    }

}