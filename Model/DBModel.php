<?php

class DBModel {

    protected $db = null;
    protected $connected = false;

     public function __construct() {
        $this->connected = $this->connect_to_db();
     }


    /**
     * @return: true if the connection was successful, false otherwise
     */
    private function connect_to_db() {   
        //require __DIR__. "/env_settings.php";     
        try {
            //$this->db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            $this->db = new PDO('mysql:host=localhost;dbname=heure_sup;charset=utf8', 'root', '');
            return true;
        }
        catch (Exception $e) {
            // return false;
            die("Connection to the database failed: " . $e->getMessage());
        }
    }

    // other useful methods to interact with the database
    // AND that are common to all models
    // should be implemented here

}