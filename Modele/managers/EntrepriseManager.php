<?php
namespace POO\Modele\managers;

use POO\Entity\Entreprise;

require_once(__DIR__.'/../../Vue/includes/connexion.php');
require_once (__DIR__.'/../entities/Entreprise.php');

class EntrepriseManager
{

    function getAllEntreprise($bdd){
        // fonction qui retourne toutes les entreprises
        $requete = $bdd->prepare('SELECT * FROM structure where ESTASSO = false');
        $requete->execute();

        $entreprises = $requete->fetchAll();

        $entreprisesEntities=[];
        foreach($entreprises as $entreprise) {
            $entreprisesEntities[] = new Entreprise($entreprise["ID"],$entreprise["NOM"],$entreprise["RUE"],$entreprise["CP"],
                $entreprise["VILLE"],false, $entreprise["NB_ACTIONNAIRES"]);
        }
        return $entreprisesEntities;

    }

}