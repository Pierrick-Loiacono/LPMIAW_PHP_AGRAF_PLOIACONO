<?php

require_once('Modele/entities/Secteur.php');
require_once('Controller/AssociationController.php');


use POO\Entity\AssociationController;
use POO\Entity\Secteur;


//require_once('Controller/fonctions.php');

// On récupérer la requete
//$req = getAllStructure($bdd);

$c = new AssociationController();
$c->viewListe();


// On transmet tout a affichageListe.php et on affichage le contenu
//require('Vue/affichageListe.php');

