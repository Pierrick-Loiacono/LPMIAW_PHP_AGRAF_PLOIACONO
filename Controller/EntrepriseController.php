<?php
namespace POO\Entity;

use POO\Entity\Secteur;
use POO\Modele\managers\EntrepriseManager;

require_once('Modele/entities/Secteur.php');
require_once(__DIR__ . '/../Modele/managers/EntrepriseManager.php');
require_once(__DIR__.'/../Vue/includes/connexion.php');

class EntrepriseController
{
    public function __construct()
    {
        $this->manager = new EntrepriseManager();
    }

    function viewListe(){

        $entrepriseListe = $this->manager->getAllEntreprise();

        require(__DIR__.'/../Vue/affichageEntreprise.php');

    }

    function form(){
        require(__DIR__.'/../Vue/creationStructure.php');
    }



}