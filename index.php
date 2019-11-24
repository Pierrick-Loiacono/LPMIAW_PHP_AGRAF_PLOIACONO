<?php

require_once('Controller/fonctions.php');

// On récupérer la requete
$req = getAllStructure($bdd);

// On transmet tout a affichageListe.php et on affichage le contenu
require('Vue/affichageListe.php');

