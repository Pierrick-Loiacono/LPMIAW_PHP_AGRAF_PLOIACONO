<?php

namespace POO\Entity;

use POO\Entity\Secteur;
use POO\Modele\managers\AssociationManager;

require_once('AdminController.php');
require_once('Modele/entities/Secteur.php');
require_once(__DIR__ . '/../Modele/managers/AssociationManager.php');
require_once(__DIR__.'/../Vue/includes/connexion.php');

class AssociationController extends AdminController
{

    public function __construct()
    {
        $this->manager = new AssociationManager();
    }

    function viewListe(){

        $associationListe = $this->findAll();

        require(__DIR__.'/../Vue/affichageListe.php');

    }

    public function addAssociation(): void
    {
        $ass = new Association(null, $_POST['nom'], $_POST['rue'], $_POST['postal'], $_POST['ville'], true, $_POST['donateurs']);
        $this->insert($ass);
        header("Location: index.php?action=viewListeAsso");

    }

}