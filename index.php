<?php

require_once('Modele/entities/Secteur.php');
require_once('Controller/AssociationController.php');
require_once ('Controller/EntrepriseController.php');
require_once ('Controller/SecteurController.php');


use POO\Entity\AssociationController;
use POO\Entity\EntrepriseController;
use POO\Entity\SecteurController;


//require_once('Controller/fonctions.php');

// On récupérer la requete
//$req = getAllStructure($bdd);

$c = new AssociationController();
$c->viewListe();

$e = new EntrepriseController();
$e->viewListe();
$e->form();

$s = new SecteurController();
$s->viewliste();
// On transmet tout a affichageListe.php et on affichage le contenu
//require('Vue/affichageListe.php');

