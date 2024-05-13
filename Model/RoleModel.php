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
        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT id FROM role WHERE nom = '$role'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entry = $statement->fetchAll();

        $result = $entry;
        return $result;
    }
    

}