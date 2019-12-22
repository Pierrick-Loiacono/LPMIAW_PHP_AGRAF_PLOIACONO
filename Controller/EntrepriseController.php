<?php
namespace POO\Entity;

use POO\Entity\Entreprise;
use POO\Modele\managers\EntrepriseManager;

require_once('AdminController.php');
require_once('Modele/entities/Entreprise.php');
require_once(__DIR__ . '/../Modele/managers/EntrepriseManager.php');
require_once(__DIR__.'/../Vue/includes/connexion.php');

class EntrepriseController extends AdminController
{
    public function __construct()
    {
        $this->manager = new EntrepriseManager();
    }

    function viewListe()
    {
        $entrepriseListe = $this->manager->findAll();

        require(__DIR__ . '/../Vue/affichageListe.php');
    }

    public function addEntreprise(): void
    {
        try{

            $ent = new Entreprise(null, $_POST['nom'], $_POST['rue'], $_POST['postal'], $_POST['ville'], false, intval($_POST['actionnaire']));
            $this->manager->insert($ent);
            $_SESSION['MSG_OK'] = 'L\'entreprise a été créée !';
            header("Location: index.php?action=viewListeEntre");
        } catch(\Exception $ex) {
            retourMsgErreurCreation($ex);
        }
    }

    public function updateEntreprise(Entity $e)
    {
        $this->manager->update($e);
        $this->manager->updateSecteurInStructure($e);
    }

    public function deleteEntreprise(Entity $e)
    {
        $this->manager->delete($e);
    }

}