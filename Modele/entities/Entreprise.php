<?php

namespace POO\Entity;

use POO\Entity\Structure;
require_once('Structure.php');

/**
 * Class Entreprise
 * @package POO\Entity
 */
class Entreprise extends Structure
{
    /**
     * @var int
     */
    private $actionnaires;

    /**
     * @return int
     */
    public function getActionnaires(): int
    {
        return $this->actionnaires;
    }

    /**
     * @param int $actionnaires
     */
    public function setActionnaires(int $actionnaires): void
    {
        $this->actionnaires = $actionnaires;
    }

    /**
     * Entreprise constructor.
     * @param int|null $id
     * @param string $nom
     * @param string $rue
     * @param string $code_postal
     * @param string $ville
     * @param bool $estAsso
     * @param int $actionnaires
     */
    public function __construct(?int $id, string $nom, string $rue, string $code_postal, string $ville, bool $estAsso, int $actionnaires)
    {
        parent::__construct($id,$nom,$rue,$code_postal,$ville,$estAsso);
        $this->actionnaires = $actionnaires;
    }

}