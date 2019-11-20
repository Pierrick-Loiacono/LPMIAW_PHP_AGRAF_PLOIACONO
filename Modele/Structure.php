<?php

namespace POO\Entity;

abstract class Structure
{
    /**
     * @var
     */
    private $id;
    /**
     * @var String
     */
    private $nom;
    /**
     * @var String
     */
    private $rue;
    /**
     * @var String
     */
    private $code_postal;
    /**
     * @var String
     */
    private $ville;
    /**
     * @var bool
     */
    private $estAsso;
    /**
     * @var int
     */
    private $nombreDonateurs;
    /**
     * @var int
     */
    private $nombreActionnaires;

    /**
     * Structure constructor.
     * @param int $id
     * @param String $nom
     * @param String $rue
     * @param String $code_postal
     * @param String $ville
     * @param bool $estAsso
     * @param int $nombreDonateurs
     * @param int $nombreActionnaires
     */
    public function __construct(String $nom, String $rue, String $code_postal, String $ville, bool $estAsso, int $nombreDonateurs, int $nombreActionnaires)
    {

        $this->nom = $nom;
        $this->rue = $rue;
        $this->code_postal = $code_postal;
        $this->ville = $ville;
        $this->estAsso = $estAsso;
        $this->nombreDonateurs = $nombreDonateurs;
        $this->nombreActionnaires = $nombreActionnaires;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getNom(): String
    {
        return $this->nom;
    }

    /**
     * @param String $nom
     */
    public function setNom(String $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return String
     */
    public function getRue(): String
    {
        return $this->rue;
    }

    /**
     * @param String $rue
     */
    public function setRue(String $rue): void
    {
        $this->rue = $rue;
    }

    /**
     * @return String
     */
    public function getCodePostal(): String
    {
        return $this->code_postal;
    }

    /**
     * @param String $code_postal
     */
    public function setCodePostal(String $code_postal): void
    {
        $this->code_postal = $code_postal;
    }

    /**
     * @return String
     */
    public function getVille(): String
    {
        return $this->ville;
    }

    /**
     * @param String $ville
     */
    public function setVille(String $ville): void
    {
        $this->ville = $ville;
    }

    /**
     * @return bool
     */
    public function isEstAsso(): bool
    {
        return $this->estAsso;
    }

    /**
     * @param bool $estAsso
     */
    public function setEstAsso(bool $estAsso): void
    {
        $this->estAsso = $estAsso;
    }

    /**
     * @return int
     */
    public function getNombreDonateurs(): int
    {
        return $this->nombreDonateurs;
    }

    /**
     * @param int $nombreDonateurs
     */
    public function setNombreDonateurs(int $nombreDonateurs): void
    {
        $this->nombreDonateurs = $nombreDonateurs;
    }

    /**
     * @return int
     */
    public function getNombreActionnaires(): int
    {
        return $this->nombreActionnaires;
    }

    /**
     * @param int $nombreActionnaires
     */
    public function setNombreActionnaires(int $nombreActionnaires): void
    {
        $this->nombreActionnaires = $nombreActionnaires;
    }



}