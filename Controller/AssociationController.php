<?php
namespace POO\Entity;

use POO\Entity\Secteur;
use POO\Modele\managers\AssociationManager;

require_once('AdminController.php');
require_once('Modele/entities/Association.php');
require_once(__DIR__ . '/../Modele/managers/AssociationManager.php');
require_once(__DIR__.'/../Vue/includes/connexion.php');

class AssociationController extends AdminController
{
    public function __construct()
    {
        $this->manager = new AssociationManager();
    }

    function viewListe()
    {
        $associationListe = $this->manager->findAll();
        require(__DIR__.'/../Vue/affichageListe.php');
    }

    public function addAssociation(): void
    {
        try{

            $ass = new Association(null, $_POST['nom_asso'], $_POST['rue_asso'], $_POST['postal_asso'], $_POST['ville_asso'], true, intval($_POST['donateur']));
            $this->manager->insert($ass);
            $_SESSION['MSG_OK'] = 'L\'association a été créé !';
            header("Location: index.php?action=viewListeAsso");
        } catch(\Exception $ex) {
            retourMsgErreurCreation($ex);
        }
    }

    public function updateAssociation(Entity $e): void
    {
        $this->manager->update($e);
        $this->manager->updateSecteurInStructure($e);
    }

    public function deleteAssociation(Entity $e): void
    {
        $this->manager->delete($e);
    }

}