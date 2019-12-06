<?php
namespace POO\Modele\managers;

use PDOStatement;
use POO\Entity\Entity;
use POO\Entity\Entreprise;

require_once('PDOManager.php');

require_once(__DIR__.'/../../Vue/includes/connexion.php');
require_once (__DIR__.'/../entities/Entreprise.php');

class EntrepriseManager extends PDOManager
{
    /**
     * @param Entity $e
     * @return
     */
    function insertEntreprise(Entreprise $e)
    {
        $req = "INSERT INTO structure(nom, rue, cp, ville, nb_actionnaires, estasso, nb_donateurs) 
                            VALUES (:nom, :rue, :cp, :ville, :nbActionnaires, false, null)";
        $params = array("nom" => $e->getNom(), "rue" => $e->getRue(), "cp" => $e->getCodePostal(), "ville" => $e->getVille(), "nbActionnaires"=>$e->getActionnaires());
        $res = $GLOBALS['bdd']->prepare($req);
        $res->execute($params);
        header("Location: index.php?action=viewListeEntre");

    }

    function updateEntreprise(Entreprise $e){
        $req= "UPDATE structure(nom, rue, cp, ville, nb_actionnaires) SET (:nom, :rue, :cp, :ville, :nb_actionnaires) WHERE id=".$e->getId();
        $params = array(
            "nom"            => $e->getNom(),
            "rue"            => $e->getRue(),
            "cp"             => $e->getCodePostal(),
            "ville"          => $e->getVille(),
            "nbActionnaires" => $e->getActionnaires()
        );
        $res = $GLOBALS['bdd']->prepare($req);
        $res->execute($params);
        return $res;
    }

    public function deleteEntreprise(Entity $e): PDOStatement {
        $req = "DELETE * from structure WHERE id=".$e->getId();
        $res = $GLOBALS['bdd']->prepare($req);
        $res->execute();
        return $res;
    }

    public function findById(int $id): ?Entity
    {
        // TODO: Implement findById() method.
    }

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("SELECT * FROM structure where ESTASSO = false",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        // fonction qui retourne toutes les entreprises
        $stmt=$this->find();
        $entreprises = $stmt->fetchAll($pdoFecthMode);

        $entreprisesEntities=[];
        foreach($entreprises as $entreprise) {
            $entreprisesEntities[] = new Entreprise($entreprise["ID"],$entreprise["NOM"],$entreprise["RUE"],$entreprise["CP"],
                $entreprise["VILLE"],false, $entreprise["NB_ACTIONNAIRES"]);
        }
        return $entreprisesEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        // TODO: Implement insert() method.
    }
}