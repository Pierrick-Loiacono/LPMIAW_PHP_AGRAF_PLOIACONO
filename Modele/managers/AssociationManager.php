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

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("SELECT * FROM structure where ESTASSO = true",[]);
        return $stmt;
    }

    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("SELECT * FROM structure WHERE id=:id", ["id" => $id]);
        $association = $stmt->fetch();
        if (!$association) return null;
        return new Association($association["ID"], $association["NOM"], $association["RUE"],$association["CP"],$association["VILLE"],true,$association["NB_DONATEURS"]);
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
                            VALUES (:nom, :rue, :cp, :ville, null, true, :nbDonateurs)";
        $params = array("nom" => $e->getNom(), "rue" => $e->getRue(), "cp" => $e->getCodePostal(), "ville" => $e->getVille(), "nbDonateurs"=>$e->getDonateurs());
        $res=$this->executePrepare($req, $params);
        return $res;
    }

    public function update(Entity $e): PDOStatement
    {
        $req = "UPDATE structure SET nom=:nom, rue=:rue, cp=:cp, ville=:ville, nb_donateurs=:nb_donateurs WHERE id = :id";

        $params = [
            "nom" => $e->getNom(),
            "rue" => $e->getRue(),
            "cp" => $e->getCodePostal(),
            "ville" => $e->getVille(),
            "nb_donateurs" => $e->getDonateurs(),
            "id"=> $e->getId()
        ];
        $res = $this->executePrepare($req, $params);

        return $res;
    }

    public function delete(Entity $e): PDOStatement {
        $req = "DELETE from structure WHERE id = :id";
        $params = [
            "id"=> $e->getId()
        ];
        $res = $this->executePrepare($req, $params);
        return $res;
    }

}