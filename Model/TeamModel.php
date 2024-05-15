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
            $team = array(
                "nom" => $entry['nom'],
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

}