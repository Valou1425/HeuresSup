<?php
function RequeteSQL($query) {
    try {
    	$database = new PDO('mysql:host=localhost;dbname=heure_sup;charset=utf8', 'root', '');
	} catch(Exception $e) {
    	die('Erreur : '.$e->getMessage());
	}
    $statement=$database->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();

	return $result;

}

?>