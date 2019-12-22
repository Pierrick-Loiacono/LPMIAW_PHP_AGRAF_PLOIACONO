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
        $secteurListe = $this->manager->findAll();
        require(__DIR__.'/../Vue/affichageListe.php');
    }

    function findAllSecteur()
    {
        return $this->manager->findAll();
    }

    public function addSecteur(): void
    {
        try{
            $ent = new Secteur(null, $_POST['nom_secteur']);
            $this->manager->insert($ent);
            $_SESSION['MSG_OK'] = 'Le secteur a été créé !';
            header("Location: index.php?action=viewListeSect");
        } catch(\Exception $ex) {
            retourMsgErreurCreation($ex);
        }
    }

    public function deleteSecteur(Entity $e)
    {
        $this->manager->delete($e);
    }

    public function updateSecteur(Entity $e)
    {
        $this->manager->update($e);
    }
}