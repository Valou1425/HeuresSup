<?php

require_once("DBModel.php");

class UserModel extends DBModel {


    /**
     * @return an associative array of all employees with first_name, last_name, id, creation_date (not formatted)
     */
    function check_login(string $login, string $password) {
        $result = [];
        if (!$this->connected) {
            // Something went wrong during the connection to the database.
            // In this example, we simply do not perform the query...
            // A real website should display a message for users to understand while they cannot log in
            return $result;
        }
        // The request uses the MD5() functions since password should not be stored
        // without any protection in the database (i.e., use MD5() to store and retrieve passwords)
        $request = "SELECT * FROM user WHERE login='$login' AND password='$password'";
        $statement = $this->db->prepare($request);
        $statement->execute();
        $entries = $statement->fetchAll();
        $result = $entries;
        if (count($entries) == 1) {
            $result["firstname"] = $entries[0]['firstname'];
            $result["lastname"] = $entries[0]['lastname'];
            $result["id"] = $entries[0]['id'];
        } 
        return $result;
    }


    function getTeamID(int $id) {
        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT equipe_id FROM user WHERE id = '$id'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entry = $statement->fetch();

        if ($entry) {
            return $entry['equipe_id'];
        } else {
            return null;
        }
        
    }

    function getRoleID(int $id) {
        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT role_id FROM user WHERE id = '$id'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entry = $statement->fetch();

        if ($entry) {
            return $entry['role_id']; // Retourne l'ID du rôle s'il est trouvé
        } else {
            return null; // Retourne null si aucun résultat n'est trouvé
        }
        
    }

    function getFirstNameANDLastName(int $id) {

        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT firstname, lastname FROM user WHERE id = '$id'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entries = $statement->fetchAll();

        foreach ($entries as $entry) {
            $name = array(
                "firstname" => $entry['firstname'],
                "lastname" => $entry['lastname']
            );
            $result[] = $name;
        }
        return $result;

        if ($entry) {
            return $entry['firstname']; // Retourne l'ID du rôle s'il est trouvé
        } else {
            return null; // Retourne null si aucun résultat n'est trouvé
        }

    }

    function new_user(string $firstname, string $lastname, string $login, string $password, string $team, string $role) {

        if (!$this->connected) {
            return $result;
        }
       
        $requete = "INSERT INTO user (firstname, lastname, login, password, role_id, equipe_id) VALUES ('$firstname', '$lastname' ,'$login', '$password', '$role', '$team')";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        
    }

    function getUserID(string $firstName, string $lastName) {
        
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT id FROM user WHERE firstname = '$firstName' AND lastname = '$lastName'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entry = $statement->fetch();

        if ($entry) {
            return $entry['id']; // Retourne l'ID du rôle s'il est trouvé
        } else {
            return null; // Retourne null si aucun résultat n'est trouvé
        }

    }

    function getAllUsersID() {

        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT DISTINCT id FROM user";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entries = $statement->fetchAll();

        foreach ($entries as $entry) {
            $id = array(
                "id" => $entry['id']
            );
            $result[] = $id;
        }
        return $result;

    }

    function ChangePassword(string $newPassword, string $login) {
        $requete = "UPDATE user set password = '$newPassword' WHERE login='$login'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
    }

    // other useful methods to interact with the database
    // could be to add a new user, to delete a user, to update a user, etc.
    // all these methods will be called by the controller
    // and will be used to display the correct view
    // (e.g., if the user is added, the controller will call the view to display the welcome page)
    // (e.g., if the user is not added, the controller will call the view to display the login form with an error message)
    
}
