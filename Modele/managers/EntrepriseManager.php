<?php
namespace POO\Modele\managers;

require_once(__DIR__.'/../../Vue/includes/connexion.php');

class EntrepriseManager
{

    function getAllEntreprise($bdd){
        // fonction qui retourne toutes les structures
        $requete = $bdd->query('SELECT * FROM structure where ESTASSO = false');

        return $requete;
    }

}