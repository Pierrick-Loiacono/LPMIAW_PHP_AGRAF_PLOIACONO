<?php

namespace POO\Entity;
require_once('Entity.php');

class Secteur extends Entity
{
    /**
     * @var
     */
    private $id;
    /**
     * @var String
     */
    private $libelle;

    /**
     * Secteur constructor.
     * @param int|null $id
     * @param String $libelle
     */
    public function __construct(?int $id, String $libelle)
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }

    /**
     * @return mixed
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId(?int $id): void
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



}