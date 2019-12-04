<?php
namespace POO\Modele\managers;

require_once(__DIR__.'/../../Vue/includes/connexion.php');

class SecteurManager
{
    function getAllSecteur($bdd){
        // fonction qui retourne tous les secteurs
        $requete = $bdd->prepare('SELECT * FROM secteur');
        $requete->execute();

        return $requete;
    }
}