<?php
$host = 'localhost'; // ip du serveur SQL
$encoding="utf8";
$db = 'structures'; // Nom de la base de donnée
$user = 'aspi'; // User avec les droits
$pass = 'aspi'; // …
$pdoErrorMode=\PDO::ERRMODE_EXCEPTION;

//try {
//    $bdd = new PDO("mysql:host=$host;dbname=$base;charset=utf8", $user, $password);
//} catch (PDOException $e) {
//    print "Erreur !: " . $e->getMessage() . "<br/>";
//    die();
//}
