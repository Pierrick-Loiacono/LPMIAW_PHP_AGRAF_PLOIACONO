<?php

include('Vue/includes/connexion.php');
global $bdd;

function getAllStructure($bdd){
    // fonction qui retourne toutes les structures
    $requete = $bdd->query('SELECT * FROM structure');
    return $requete;
}
