<?php
namespace POO\Modele\managers;

use PDOStatement;
use POO\Entity\Entity;
use POO\Entity\Association;

require_once('PDOManager.php');
require_once(__DIR__.'/../../Vue/includes/connexion.php');
require_once(__DIR__.'/../entities/Association.php');

class AssociationManager extends PDOManager
{
    function getAllAssociation(int $pdoFecthMode): array{

    }

    public function findById(int $id): ?Entity
    {
        // TODO: Implement findById() method.
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("SELECT * FROM structure where ESTASSO = true",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        // fonction qui retourne toutes les associations
        $stmt=$this->find();
        $associations = $stmt->fetchAll($pdoFecthMode);

        $associationsEntities=[];
        foreach($associations as $association) {
            $associationsEntities[] = new Association($association["ID"],$association["NOM"],$association["RUE"],$association["CP"],
                $association["VILLE"],true, $association["NB_DONATEURS"]);
        }
        return $associationsEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "INSERT INTO structure(nom, rue, cp, ville, nb_actionnaires, estasso, nb_donateurs) 
                            VALUES (:nom, :rue, :cp, :ville, :nbDonateurs, true, null)";
        $params = array("nom" => $e->getNom(), "rue" => $e->getRue(), "cp" => $e->getCodePostal(), "ville" => $e->getVille(), "nbDonateurs"=>$e->getDonateurs());
        $res=$this->executePrepare($req, $params);
        return $res;
    }
}