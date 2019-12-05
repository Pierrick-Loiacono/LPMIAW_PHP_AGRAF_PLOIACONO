<?php
namespace POO\Modele\managers;

use POO\Entity\Association;
use POO\Entity\Structure;

require_once(__DIR__.'/../../Vue/includes/connexion.php');
require_once(__DIR__.'/../entities/Association.php');

class AssociationManager
{
    function getAllAssociation($bdd){
        // fonction qui retourne toutes les associations
        $requete = $bdd->prepare('SELECT * FROM structure where ESTASSO = true');
        $requete->execute();

        $associations = $requete->fetchAll();

        $associationsEntities=[];
        foreach($associations as $association) {
            $associationsEntities[] = new Association($association["ID"],$association["NOM"],$association["RUE"],$association["CP"],
                $association["VILLE"],true, $association["NB_DONATEURS"]);
        }
        return $associationsEntities;
    }
}