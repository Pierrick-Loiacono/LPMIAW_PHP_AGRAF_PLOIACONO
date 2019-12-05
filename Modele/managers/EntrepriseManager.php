<?php
namespace POO\Modele\managers;

use POO\Entity\Entreprise;

require_once(__DIR__.'/../../Vue/includes/connexion.php');
require_once (__DIR__.'/../entities/Entreprise.php');

class EntrepriseManager
{

    function getAllEntreprise(){
        // fonction qui retourne toutes les entreprises
        $requete = $GLOBALS['bdd']->prepare('SELECT * FROM structure where ESTASSO = false');
        $requete->execute();

        $entreprises = $requete->fetchAll();

        $entreprisesEntities=[];
        foreach($entreprises as $entreprise) {
            $entreprisesEntities[] = new Entreprise($entreprise["ID"],$entreprise["NOM"],$entreprise["RUE"],$entreprise["CP"],
                $entreprise["VILLE"],false, $entreprise["NB_ACTIONNAIRES"]);
        }
        return $entreprisesEntities;

    }

    function getLastId(){

        // fonction qui retourne toutes les entreprises
        $requete = $GLOBALS['bdd']->prepare('SELECT id FROM structure where ESTASSO = false ORDER BY id DESC LIMIT 1');
        $requete->execute();
        $ligne = $requete->fetch();
        $id = intval($ligne['id']) + 1;

        return $id;
    }

    function addEntreprise(){

    }

}