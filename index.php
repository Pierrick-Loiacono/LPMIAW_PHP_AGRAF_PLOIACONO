<?php

require_once('Modele/entities/Secteur.php');
require_once('Controller/IndexController.php');

use POO\Entity\IndexController;
use POO\Entity\Secteur;


//require_once('Controller/fonctions.php');

// On récupérer la requete
//$req = getAllStructure($bdd);

$c = new IndexController();
$c->viewListe();

// On transmet tout a affichageListe.php et on affichage le contenu
//require('Vue/affichageListe.php');

