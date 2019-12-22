<?php

require_once('Modele/entities/Secteur.php');
require_once('Modele/managers/SecteurManager.php');
require_once('Modele/managers/EntrepriseManager.php');
require_once('Controller/AssociationController.php');
require_once('Controller/EntrepriseController.php');
require_once('Controller/SecteurController.php');
include('Vue/includes/header.php');
use POO\Modele\managers\AssociationManager;
use POO\Modele\managers\EntrepriseManager;
use POO\Modele\managers\SecteurManager;
use POO\Entity\AssociationController;
use POO\Entity\EntrepriseController;
use POO\Entity\SecteurController;

try {
    if (isset($_GET["action"])) {
            $entrepriseCtrl = new EntrepriseController();
            $associationCtrl = new AssociationController();
            $secteurCtrl = new SecteurController();
            switch ($_GET["action"]) {
                case "viewListeEntre": // Liste des Entreprises
                    $secteurs = $secteurCtrl->findAllSecteur();
                    $entrepriseCtrl->viewListe();
                    break;
                case "viewListeSect": // Liste des Secteurs
                    $secteurCtrl->viewliste();
                    break;
                case "viewListeAsso": // Liste des Associations
                    $associationCtrl->viewListe();
                    break;
                case "creationStructure":
                    $secteurs = $secteurCtrl->findAllSecteur();
                    if(isset($_POST['enregistrer_entreprise'])) {
                        $entrepriseCtrl->addEntreprise();
                    }elseif (isset($_POST['enregistrer_association'])){
                        $associationCtrl->addAssociation();
                    }elseif (isset($_POST['enregistrer_secteur'])){
                        $secteurCtrl->addSecteur();
                    }
                    require(__DIR__ . '/Vue/creation.php');
                    break;
                case "editSecteur": // edition des Associations
                    $secteur = $secteurCtrl->getManager()->findById(intval($_GET['id']));
                    if (isset($_POST['modifier_secteur'])){
                        $secteur->setLibelle($_POST['nom_secteur']);
                        $secteurCtrl->updateSecteur($secteur);
                        $_SESSION['MSG_OK'] = 'Le secteur a été modifié !';
                        header("Location: index.php?action=viewListeSect");
                    } elseif (isset($_POST['supprimer_secteur'])) {
                        $secteurCtrl->deleteSecteur($secteur);
                        $_SESSION['MSG_SUPP'] = 'Le secteur a été supprimé !';
                        header("Location: index.php?action=viewListeSect");
                    }else {
                        require(__DIR__ . '/Vue/secteur/editionSecteur.php');
                    }
                    break;
                case "editEntreprise": //edition des entreprises
                    $entity = $entrepriseCtrl->getManager()->findById(intval($_GET['id']));
                    if (isset($_POST['modifier_entity'])){
                        $entity->setNom($_POST['nom_entity']);
                        $entity->setRue($_POST['rue_entity']);
                        $entity->setCodePostal($_POST['postal_entity']);
                        $entity->setVille($_POST['ville_entity']);
                        $entity->setActionnaires(intval($_POST['actionnaire_entreprise']));
                        $entrepriseCtrl->updateEntreprise($entity);
                        $_SESSION['MSG_OK'] = 'L\'entreprise a été modifiée !';
                        header("Location: index.php?action=viewListeEntre");
                    } elseif (isset($_POST['supprimer_entity'])) {
                        $entrepriseCtrl->deleteEntreprise($entity);
                        $_SESSION['MSG_SUPP'] = 'L\'entreprise a été supprimé !';
                        header("Location: index.php?action=viewListeEntre");
                    }else {
                        $secteurs = $secteurCtrl->findAllSecteur();
                        $entrepriseSecteur = $entrepriseCtrl->getManager()->findStructureSecteur(intval($_GET['id']));
                        require(__DIR__ . '/Vue/structure/editionStructure.php');
                    }
                    break;
                case "editAsso": //edition des entreprises
                    $entity = $associationCtrl->getManager()->findById(intval($_GET['id']));
                    if (isset($_POST['modifier_entity'])){
                        $entity->setNom($_POST['nom_entity']);
                        $entity->setRue($_POST['rue_entity']);
                        $entity->setCodePostal($_POST['postal_entity']);
                        $entity->setVille($_POST['ville_entity']);
                        $entity->setDonateurs(intval($_POST['donateur_association']));
                        $associationCtrl->updateAssociation($entity);
                        $_SESSION['MSG_OK'] = 'L\'association a été modifiée !';
                        header("Location: index.php?action=viewListeAsso");
                    } elseif (isset($_POST['supprimer_entity'])) {
                        $associationCtrl->deleteAssociation($entity);
                        $_SESSION['MSG_SUPP'] = 'L\'association a été supprimé !';
                        header("Location: index.php?action=viewListeAsso");
                    } else {
                        $secteurs = $secteurCtrl->findAllSecteur();
                        $associationSecteur = $associationCtrl->getManager()->findStructureSecteur(intval($_GET['id']));
                        require(__DIR__ . '/Vue/structure/editionStructure.php');
                    }

                    break;
                default: // Accueil
                    header("Location: index.php?action=viewListeEntre");
                    break;
            }
        } else {
            header("Location: index.php?action=viewListeEntre");
        }

    } catch (Exception $ex) {
        $error="Error ".$ex->getCode()." : ".$ex->getMessage()."<br/>".str_replace("\n","<br/>",$ex->getTraceAsString());
    }
    if (isset($error)) {
        require(__DIR__.'/Vue/error/viewError.php');
    }

include('Vue/includes/footer.php');

