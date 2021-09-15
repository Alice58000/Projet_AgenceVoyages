<?php

$serveurname="localhost";
$dbname="projet_voyages";
$username="root";
$password="";


try {
    $db= new PDO("mysql:host=$serveurname;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
}
catch(PDOException $e) {
echo 'connexion failed:' . $e->getMessage();
}

