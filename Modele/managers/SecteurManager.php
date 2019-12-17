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
        $stmt = $this->executePrepare("SELECT * FROM secteur WHERE id=:id", ["id" => $id]);
        $secteur = $stmt->fetch();
        if (!$secteur) return null;
        return new Secteur($secteur["ID"], $secteur["LIBELLE"]);

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
        $req = "INSERT INTO secteur(libelle) VALUES (:libelle)";
        $params = array("libelle" => $e->getLibelle());
        $res = $this->executePrepare($req, $params);
        return $res;
    }

    public function update(Entity $e): PDOStatement
    {
        $req = "UPDATE secteur SET libelle = :libelle WHERE id = :id";
        $params = ["libelle" => $e->getLibelle(), "id" => $e->getId()];
        $res = $this->executePrepare($req, $params);
        return $res;
    }

}