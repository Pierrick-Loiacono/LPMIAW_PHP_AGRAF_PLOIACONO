<?php
namespace POO\Modele\managers;

use PDOStatement;
use POO\Entity\Entity;
use POO\Entity\Secteur;

require_once('PDOManager.php');
require_once(__DIR__.'/../../Vue/includes/connexion.php');
require_once (__DIR__.'/../entities/Secteur.php');

class SecteurManager extends PDOManager
{

    public function findById(int $id): ?Entity
    {
        // TODO: Implement findById() method.
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("SELECT * FROM secteur",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        // fonction qui retourne tous les secteurs
        $stmt=$this->find();
        $secteurs = $stmt->fetchAll($pdoFecthMode);

        $secteursEntities=[];
        foreach($secteurs as $secteur) {
            $secteursEntities[] = new Secteur($secteur["ID"],$secteur["LIBELLE"]);
        }
        return $secteursEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        // TODO: Implement insert() method.
    }
}