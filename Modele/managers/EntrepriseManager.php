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

    // Execute une requete pour récupérer toutes les lignes dont ESTASSO est à false (c'est à dire des entreprises)
    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("SELECT * FROM structure where ESTASSO = false",[]);
        return $stmt;
    }

    // Récupére une entreprise via un id
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("SELECT * FROM structure WHERE id=:id", ["id" => $id]);
        $entreprise = $stmt->fetch();
        if (!$entreprise) return null;
        return new Entreprise($entreprise["ID"], $entreprise["NOM"], $entreprise["RUE"],$entreprise["CP"],$entreprise["VILLE"],false,$entreprise["NB_ACTIONNAIRES"]);
    }

    // Retourne, sous forme d'objet, chaque entreprise
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



    // Insère une entreprise dans la base de données
    public function insert(Entity $e): PDOStatement
    {
        $req = "INSERT INTO structure(nom, rue, cp, ville, nb_actionnaires, estasso, nb_donateurs) 
                            VALUES (:nom, :rue, :cp, :ville, :nbActionnaires, false, null)";
        $params = array("nom" => $e->getNom(), "rue" => $e->getRue(), "cp" => $e->getCodePostal(), "ville" => $e->getVille(), "nbActionnaires"=>$e->getActionnaires());
        $res = $this->executePrepare($req, $params);
        return $res;
    }

    // Met à jour une ligne dans la base de donnée correspondant à l'entreprise passé en paramètre
    public function update(Entity $e): PDOStatement
    {
        $req = "UPDATE structure SET nom=:nom, rue=:rue, cp=:cp, ville=:ville, nb_actionnaires=:nb_actionnaires WHERE id = :id";

        $params = [
            "nom" => $e->getNom(),
            "rue" => $e->getRue(),
            "cp" => $e->getCodePostal(),
            "ville" => $e->getVille(),
            "nb_actionnaires" => $e->getActionnaires(),
            "id"=> $e->getId()
        ];

        $res = $this->executePrepare($req, $params);
        return $res;
    }

    

    // Supprime une entreprise dans la base de donnée
    public function delete(Entity $e): PDOStatement {
        $req = "DELETE from structure WHERE id = :id";
        $params = [
            "id"=> $e->getId()
        ];
        $this->deleteSecteurInStructure($e);
        $res = $this->executePrepare($req, $params);
        return $res;
    }

    // Permet d'associer une entreprise à des secteurs
    public function insertStructure(int $idStructure, int $idSecteur): PDOStatement
    {
        $req = "INSERT INTO secteurs_structures(id_secteur, id_structure) VALUES (:id_secteur, :id_structure)";
        $params = [
            "id_secteur" => $idSecteur,
            "id_structure" => $idStructure
        ];
        $res = $this->executePrepare($req, $params);
        return $res;
    }



    // Supprimer l'association entre un entreprise et ses secteurs (utilisé lors de la supprission d'une entreprise)
    public function deleteSecteurInStructure(Entity $e): PDOStatement {
        $req = "DELETE from secteurs_structures WHERE id_structure = :idStructure";
        $params = [
            "idStructure"=> $e->getId()
        ];
        $res = $this->executePrepare($req, $params);
        return $res;
    }
}