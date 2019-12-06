<?php

namespace POO\Entity;

use POO\Entity\Secteur;
use POO\Modele\managers\AssociationManager;

require_once('Modele/entities/Secteur.php');
require_once(__DIR__ . '/../Modele/managers/AssociationManager.php');

require_once(__DIR__.'/../Vue/includes/connexion.php');

class AssociationController
{

    public function __construct()
    {
        $this->manager = new AssociationManager();
    }

    function viewListe(){

        $associationListe = $this->manager->getAllAssociation($GLOBALS['bdd']);

        require(__DIR__.'/../Vue/affichageListe.php');

    }

    public function addAssociation(): void
    {
        $ass = new Association(null, $_POST['nom'], $_POST['rue'], $_POST['postal'], $_POST['ville'], false, $_POST['donnateurs']);
        $this->insert($ass);
        header("Location: index.php?action=viewListeAsso");

    }

}