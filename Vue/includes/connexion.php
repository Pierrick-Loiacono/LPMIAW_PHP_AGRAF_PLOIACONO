<?php
$base = 'structures'; // Nom de la base de donnée
$host = 'localhost'; // ip du serveur SQL
$user = 'aspi'; // User avec les droits
$password = 'aspi'; // …

try {
    $bdd = new PDO("mysql:host=$host;dbname=$base;charset=utf8", $user, $password);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

?>