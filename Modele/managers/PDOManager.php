<?php

namespace POO\Modele\managers;

require_once(__DIR__.'/../../Vue/includes/connexion.php');

use \PDO;
use \PDOStatement;
use \PDOException;
use POO\Entity\Entity;
use POO\Entity\Secteur;

abstract class PDOManager
{
    /*private string $host, $db, $encoding, $user, $pass;
    private int $pdoErrorMode;*/
    private $host, $db, $encoding, $user, $pass;
    private $pdoErrorMode;

    /**
     * Manager constructor
     */
    public function __construct()
    {
        $this->host = $GLOBALS["host"];
        $this->db = $GLOBALS["db"];
        $this->encoding = $GLOBALS["encoding"];
        $this->user = $GLOBALS["user"];
        $this->pass = $GLOBALS["pass"];
        $this->pdoErrorMode = $GLOBALS["pdoErrorMode"];
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @return string
     */
    public function getDb(): string
    {
        return $this->db;
    }

    /**
     * @param string $db
     */
    public function setDb(string $db): void
    {
        $this->db = $db;
    }

    /**
     * @return string
     */
    public function getEncoding(): string
    {
        return $this->encoding;
    }

    /**
     * @param string $encoding
     */
    public function setEncoding(string $encoding): void
    {
        $this->encoding = $encoding;
    }

    /**
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPass(): string
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     */
    public function setPass(string $pass): void
    {
        $this->pass = $pass;
    }

    /**
     * @return int
     */
    public function getPdoErrorMode(): int
    {
        return $this->pdoErrorMode;
    }

    /**
     * @param int $pdoErrorMode
     */
    public function setPdoErrorMode(int $pdoErrorMode): void
    {
        $this->pdoErrorMode = $pdoErrorMode;
    }

    protected function dbConnect() : PDO
    {
        $conn = new PDO("mysql:host=$this->host;dbname=$this->db;charset=$this->encoding", $this->user, $this->pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, $this->pdoErrorMode);
        return $conn;
    }

    // Retourne le dernier ID ajouté à la base de données
    public function lastId(){
        $stmt = $this->executePrepare("SELECT id FROM structure ORDER BY id DESC LIMIT 0, 1", []);
        $idA = $stmt->fetch();
        return intval($idA["id"]);
    }

    // Retourne les secteurs associés  une structure
    public function findStructureSecteur(int $idStructure)
    {
        $req="SELECT id_secteur FROM secteurs_structures WHERE id_structure = :id";
        $params = [
            "id"=> $idStructure,
        ];
        $res = $this->executePrepare($req,$params);
        return $res->fetchAll();
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

    public function updateSecteurInStructure(Entity $e){
        $this->deleteSecteurInStructure($e);
        if (sizeof($_SESSION['secteurs']) > 0){
            foreach ($_SESSION['secteurs'] as $s){
                $this->insertStructure($e->getId(), intval($s));
            }
        }
    }

    public function deleteSecteurInStructure(Entity $e): PDOStatement {
        if($e instanceof Secteur){
            $req = "DELETE from secteurs_structures WHERE id_secteur = :idSecteur";
            $params = [
                "idSecteur"=> $e->getId()
            ];
        } else {
            $req = "DELETE from secteurs_structures WHERE id_structure = :idStructure";
            $params = [
                "idStructure"=> $e->getId()
            ];
        }
        $res = $this->executePrepare($req, $params);
        return $res;
    }

    protected function executePrepare(string $req, array $params) : PDOStatement {
        $conn = null;
        try {
            $conn = $this->dbConnect();
            $stmt = $conn->prepare($req);

            $res = $stmt->execute($params);

            return $stmt;
        }
        catch (PDOException $ex) {
            //echo "Error ".$ex->getCode()." : ".$ex->getMessage()."<br/>".$ex->getTraceAsString();
            throw $ex;
        }
        finally {
            if ($conn != null) {
                $conn = null;
            }
        }
    }

    public abstract function findById(int $id) : ?Entity;
    public abstract function find() : PDOStatement;
    public abstract function findAll() : array;
    public abstract function insert(Entity $e) : PDOStatement;
    public abstract function delete(Entity $e) : PDOStatement;
    public abstract function update(Entity $e) : PDOStatement;
}