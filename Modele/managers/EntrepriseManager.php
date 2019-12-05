<?php
namespace POO\Modele\managers;

use POO\Entity\Entity;
use POO\Entity\Entreprise;

require_once(__DIR__.'/../../Vue/includes/connexion.php');
require_once (__DIR__.'/../entities/Entreprise.php');

class EntrepriseManager
{

    function getAllEntreprise() : array
    {
        // fonction qui retourne toutes les entreprises
        $requete = $GLOBALS['bdd']->prepare('SELECT * FROM structure where ESTASSO = false');
        $requete->execute();

        $entreprises = $requete->fetchAll();

        $entreprisesEntities=[];
        foreach($entreprises as $entreprise) {
            $entreprisesEntities[] = new Entreprise($entreprise["ID"],$entreprise["NOM"],$entreprise["RUE"],$entreprise["CP"],
                $entreprise["VILLE"],false, $entreprise["NB_ACTIONNAIRES"]);
        }
        return $entreprisesEntities;

    }

    function getLastId(){

        // fonction qui retourne toutes les entreprises
        $requete = $GLOBALS['bdd']->prepare('SELECT id FROM structure where ESTASSO = false ORDER BY id DESC LIMIT 1');
        $requete->execute();
        $ligne = $requete->fetch();
        $id = intval($ligne['id']) + 1;

        return $id;
    }

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
        return $res;
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

}