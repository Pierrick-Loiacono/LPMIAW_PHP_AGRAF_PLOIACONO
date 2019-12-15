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
        $entrepriseListe = $this->findAll();
        require(__DIR__ . '/../Vue/affichageEntreprise.php');
    }

    public function addEntreprise(): void
    {
        $ent = new Entreprise(null, $_POST['nom'], $_POST['rue'], $_POST['postal'], $_POST['ville'], false, $_POST['actionnaire']);
        $this->insert($ent);
        header("Location: index.php?action=viewListeEntre");
    }
}