<?php
namespace POO\Entity;

use POO\Entity\Secteur;
use POO\Modele\managers\SecteurManager;

require_once('AdminController.php');
require_once('Modele/entities/Secteur.php');
require_once(__DIR__ . '/../Modele/managers/SecteurManager.php');
require_once(__DIR__.'/../Vue/includes/connexion.php');

class SecteurController extends AdminController
{
    public function __construct()
    {
        $this->manager = new SecteurManager();
    }

    function viewListe()
    {
        $secteurListe = $this->findAll();
        require(__DIR__.'/../Vue/affichageListe.php');
    }

    public function addSecteur(): void
    {
        $ent = new Secteur(null, $_POST['nom_asso']);
        $this->insert($ent);
        header("Location: index.php?action=viewListeSect");
    }

    public function editSecteur(): void
    {
        $ent = new Secteur(null, $_POST['nom_secteur']);
        $this->insert($ent);
        header("Location: index.php?action=viewListeSect");
    }
}