<?php

require_once('Modele/entities/Secteur.php');
require_once('Controller/AssociationController.php');
require_once ('Controller/EntrepriseController.php');
require_once ('Controller/SecteurController.php');
require_once ('Controller/SecteurController.php');


use POO\Entity\AssociationController;
use POO\Entity\EntrepriseController;
use POO\Entity\SecteurController;

try {
    if (isset($_GET["action"])) {
            switch ($_GET["action"]) {
                case "viewListeEntre": // Liste des Entreprises
                    $e = new EntrepriseController();
                    $e->viewListe();
                    break;
                case "viewListeSect": // Liste des Secteurs
                    $s = new SecteurController();
                    $s->viewliste();
                    break;
                case "viewListeAsso": // Liste des Associations
                    $c = new AssociationController();
                    $c->viewListe();
                break;
                case "createStructure":
                    require(__DIR__.'/Vue/creationStructure.php');
                    break;
                default: // Accueil
                    require(__DIR__.'/Vue/accueil.php');
                    break;
            }

        } else {
            require(__DIR__.'/Vue/accueil.php');
        }


    } catch (Exception $ex) {
    }

//$e->form();
