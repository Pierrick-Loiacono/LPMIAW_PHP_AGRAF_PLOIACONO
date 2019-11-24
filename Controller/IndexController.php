<?php

namespace POO\Entity;

use POO\Entity\Secteur;
require_once('../Modele/Secteur.php');

include('../Vue/includes/connexion.php');
global $bdd;


class IndexController
{

    function index(){
        $all = getAllStructure();
    }

}