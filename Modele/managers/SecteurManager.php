<?php
namespace POO\Modele\managers;

use POO\Entity\Secteur;

require_once(__DIR__.'/../../Vue/includes/connexion.php');
require_once (__DIR__.'/../entities/Secteur.php');

class SecteurManager
{
    function getAllSecteur($bdd){
        // fonction qui retourne tous les secteurs
        $requete = $bdd->prepare('SELECT * FROM secteur');
        $requete->execute();

        $secteurs = $requete->fetchAll();

        $secteursEntities=[];
        foreach($secteurs as $secteur) {
            $secteursEntities[] = new Secteur($secteur["ID"],$secteur["LIBELLE"]);
        }
        return $secteursEntities;
    }
}