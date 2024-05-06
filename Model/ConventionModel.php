<?php

Class ConventionModel extends DBModel {

    function getHeureMax() {
        $result = [];
        if (!$this->connected) {
            return $result;
        }
        $requete = "SELECT * FROM convention_generale";
        $statement = $this->db->prepare($requete);
        $statement->execute();
        $entries = $statement->fetchAll();

        foreach ($entries as $entry) {
            $result["jour"] = $entry['heure_sup_max_jour'];
            $result["semaine"] = $entry['heure_sup_max_semaine'];
            $result["mois"] = $entry['heure_sup_max_mois'];
        }
        return $result;
    } 

}