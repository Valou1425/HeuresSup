<?php

require_once("DBModel.php");

class RoleModel extends DBModel {
    
    function getAllRoles() {
        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT * FROM role";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entries = $statement->fetchAll();

        foreach ($entries as $entry) {
            $role = array(
                "role" => $entry['nom'],
                "id" => $entry['id']
            );
            $result[] = $role;
        }
        return $result;
    }
    

    function getRoleID(string $role) {

        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT id FROM role WHERE nom = '$role'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entry = $statement->fetch();

        if ($entry) {
            return $entry['id']; // Retourne l'ID du rôle s'il est trouvé
        } else {
            return null; // Retourne null si aucun résultat n'est trouvé
        }

    }

    function getRole(string $id) {

        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT nom FROM role WHERE id = '$id'";
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