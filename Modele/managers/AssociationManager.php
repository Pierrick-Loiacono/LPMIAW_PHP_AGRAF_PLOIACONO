<?php
namespace POO\Modele\managers;

require_once(__DIR__.'/../../Vue/includes/connexion.php');

class AssociationManager
{
    function getAllAssociation($bdd){
        // fonction qui retourne toutes les structures
        $requete = $bdd->prepare('SELECT * FROM structure where ESTASSO = true');
        $requete->execute();

        return $requete;
    }
}