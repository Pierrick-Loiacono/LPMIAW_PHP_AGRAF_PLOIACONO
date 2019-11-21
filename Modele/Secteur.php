<?php

namespace POO\Entity;
include ('../Vue/includes/connexion.php');

class Secteur
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var String
     */
    private $libelle;

    /**
     * Secteur constructor.
     * @param int $id
     * @param String $libelle
     */
    public function __construct(String $libelle)
    {
        $this->libelle = $libelle;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getLibelle(): String
    {
        return $this->libelle;
    }

    /**
     * @param String $libelle
     */
    public function setLibelle(String $libelle): void
    {
        $this->libelle = $libelle;
    }

    public function getAllStructure($bdd){
           $requete = $bdd->prepare('SELECT * FROM structure');
           $requete->execute();
           return $requete;
    }


}