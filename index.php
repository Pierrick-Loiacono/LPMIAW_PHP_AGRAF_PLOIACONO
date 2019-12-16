<?php

require_once('Modele/entities/Secteur.php');
require_once('Modele/managers/SecteurManager.php');
require_once('Controller/AssociationController.php');
require_once('Controller/EntrepriseController.php');
require_once('Controller/SecteurController.php');

use POO\Modele\managers\SecteurManager;
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

                    if(isset($_POST['enregistrer_entreprise'])) {
                        $controller = new EntrepriseController();
                        $controller->addEntreprise();
                    }elseif (isset($_POST['enregistrer_association'])){
                        $controller = new AssociationController();
                        $controller->addAssociation();
                    }elseif (isset($_POST['enregistrer_secteur'])){
                        $controller = new SecteurController();
                        $controller->addSecteur();
                    }

                    break;
                case "editSecteur": // Liste des Associations
                    $manager = new SecteurManager();
                    $secteur = $manager->findById(intval($_GET['id']));
                    if (isset($_POST['modifier_secteur'])){
                        $secteur->setLibelle($_POST['nom_secteur']);
                        $manager->update($secteur);
                        header("Location: index.php?action=viewListeSect");

                    } else {
                        require(__DIR__.'/Vue/editionSecteur.php');
                    }
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
