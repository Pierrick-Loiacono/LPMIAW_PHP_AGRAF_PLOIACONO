<?php

namespace POO\Entity;

use POO\Entity\Secteur;
use POO\Modele\managers\SecteurManager;

require_once('Modele/entities/Secteur.php');
require_once(__DIR__ . '/../Modele/managers/SecteurManager.php');
require_once(__DIR__.'/../Vue/includes/connexion.php');
class SecteurController
{
    public function __construct()
    {
        $this->manager = new SecteurManager();
    }

    function viewListe(){

        $secteurListe = $this->manager->getAllSecteur($GLOBALS['bdd']);

        require(__DIR__.'/../Vue/affichageSecteur.php');

    }
}