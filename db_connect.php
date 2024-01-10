<?php

$dbName = "ENT";
$serverName = "localhost";
$user = "root";
$pass = "";

try {
    $db = new PDO("mysql:host=$serverName;dbname=$dbName", $user, $pass);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>