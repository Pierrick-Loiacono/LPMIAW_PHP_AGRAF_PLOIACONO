<?php

namespace POO\Entity;

use POO\Entity\Secteur;
require_once('Modele/entities/Secteur.php');
require_once(__DIR__.'/../Vue/includes/connexion.php');


class IndexController
{

    function viewListe(){

        $structures = self::getAllStructure($GLOBALS['bdd']);

        require(__DIR__.'/../Vue/affichageListe.php');

    }

    function getAllStructure($bdd){
        // fonction qui retourne toutes les structures
        $requete = $bdd->query('SELECT * FROM structure');

        return $requete;
    }

}