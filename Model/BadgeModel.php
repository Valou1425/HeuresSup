<?php

require_once("DBModel.php");

Class BadgeModel extends DBModel {

    function Embaucher(int $userID) {

        $today = date('Y-m-d');
        $now = date('Y-m-d H:i:s');

        $checkEmbauche = $this->checkEmbauche($userID);
        if ($checkEmbauche == true) {
            return ["Vous avez déjà embauché aujourd'hui.", "negative"];
        } else {

            $result = [];
            if (!$this->connected) {
                return $result;
            }
            $requete = "INSERT INTO badge (user_id, date, heure, type) VALUES ($userID, '$today', '$now', b'1')";
            $statement = $this->db->prepare($requete);
            $statement->execute();
    
            return ["Embauche enregistrée avec succès à $now", "positive"];

        }
        
    }

    function checkEmbauche(int $userID) {

        $today = date('Y-m-d');

        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT date FROM badge WHERE user_id = $userID AND type = '1' ORDER BY date DESC LIMIT 1"; // le type détermine si c'est une embauche ou une débauche ici, type = 1 veut dire embauche
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entry = $statement->fetch();

        if ($entry) {
            $today = date('Y-m-d');
            if ($today == $entry['date']) {
                return true; // Retourne vrai si la dernière embauche a eu lieu aujourd'hui
            } else {
                return false; // Retourne faux si la dernière embauche n'a pas eu lieu aujourd'hui
            }
        } else {
            return false; // Retourne faux si aucun résultat n'est trouvé (nouvel utilisateur)
        }

    }

    function Debaucher(int $userID) {

        $today = date('Y-m-d');
        $now = date('Y-m-d H:i:s');

        $checkDebauche = $this->checkDebauche($userID);
        if ($checkDebauche == true) {
            return ["Vous avez déjà débauché aujourd'hui.", "negative"];
        }

        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "INSERT INTO badge (user_id, date, heure, type) VALUES ($userID, '$today', '$now', b'0')";
        $statement = $this->db->prepare($requete);
        $statement->execute();

        $heureSupEffectue = $this->calculHeureSuppEffectue($today, $userID);
        if ($heureSupEffectue == 0) {
            return ["Débauche enregistrée avec succès à $now", "positive"];
        } else {
            $ajoutHeure = $this->ajouterHeureSup($heureSupEffectue, $userID);

            if ($ajoutHeure == 1) {
                return ["Débauche enregistrée avec succès à $now, vous avez effectué $minutes_sup heures supplémentaire", "positive"];
            } else {
                return ["Impossible d'enregistrer l'heure supp.", "negative"];
            }

        }
        
    }

    function checkDebauche(int $userID) {

        $today = date('Y-m-d');

        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT date FROM badge WHERE user_id = $userID AND type = '0' ORDER BY date DESC LIMIT 1";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entry = $statement->fetch();
        

        if ($entry) {
            $today = date('Y-m-d');
            if ($today == $entry['date']) {
                return true; // Retourne vrai si la dernière débauche a eu lieu aujourd'hui
            } else {
                return false; // Retourne faux si la dernière débauche n'a pas eu lieu aujourd'hui
            }
        } else {
            return false; // Retourne faux si aucun résultat n'est trouvé (nouvel utilisateur)
        }

    }

    function calculHeureSuppEffectue(string $date, int $userID) {

        $today = date('Y-m-d');

        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT DISTINCT heure FROM badge WHERE user_id = $userID AND type = '1' AND date = '$today'";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $result1 = $statement->fetch();
        $Embauche = $result1['heure']; // resultat sous forme : 2024-05-17 09:10:35

        $requete2 = "SELECT DISTINCT heure FROM badge WHERE user_id = $userID AND type = '0' AND date = '$today'";
        $statement2 = $this->db->prepare($requete2);
        $statement2->execute();
        $result2 = $statement2->fetch();
        $Debauche = $result2['heure'];
        
        // calcul du temps en heure de l'heure d'embauche
        $StringHeureEmbauche = explode(" ", $Embauche);
        $ArrayStringHeureEmbauche = explode(":", $StringHeureEmbauche[1]);
        $heureEmbauche = intval($ArrayStringHeureEmbauche[0]);
        $minuteEmbauche = intval($ArrayStringHeureEmbauche[1]);
        $resultSecondeEmbauche = $heureEmbauche * 3600  + $minuteEmbauche * 60;
        $resultHeureEmbauche = $resultSecondeEmbauche/3600;

        // calcul du temps en heure de l'heure de débauche
        $StringHeureDebauche = explode(" ", $Debauche);
        $ArrayStringHeureDebauche = explode(":", $StringHeureDebauche[1]);
        $heureDebauche = intval($ArrayStringHeureDebauche[0]);
        $minuteDebauche = intval($ArrayStringHeureDebauche[1]);
        $resultSecondeDebauche = $heureDebauche * 3600  + $minuteDebauche * 60;
        $resultHeureDebauche = $resultSecondeDebauche/3600;

        // calcul de la difference entre l'heure de débauche et l'heure d'embauche
        $difference = $resultHeureDebauche - $resultHeureEmbauche;

        //calcul des heure supp effectué 
        $HeureJourneeTraditionel = 8;
        $result = $difference - $HeureJourneeTraditionel;

        if($result > 0) {
            return $result;
        } else {
            $result = 0;
            return $result;
        }

    }

    function ajouterHeureSup(int $nombre, int $userID) {

        $today = date('Y-m-d');

        $result = [];
        if (!$this->connected) {
            return 0;
        }
        $requete = "INSERT INTO heure_sup (user_id, heures_sup, date) VALUES ($userID, $nombre, $today)";
        $statement = $this->db->prepare($requete);
        $statement->execute();

        return 1;

    }

}