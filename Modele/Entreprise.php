<?php

namespace POO\Entity;

use POO\Entity\Structure;
require_once ('Structure.php');

/**
 * Class Entreprise
 * @package POO\Entity
 */
class Entreprise extends Structure
{
    /**
     * @var string
     */
    private $actionnaires;

    /**
     * Entreprise constructor.
     * @param string $nom
     * @param string $rue
     * @param string $code_postal
     * @param string $ville
     * @param bool $estAsso
     * @param string $actionnaires
     */
    public function __construct(string $nom, string $rue, string $code_postal, string $ville, bool $estAsso, $actionnaires)
    {
        parent::__construct($nom,$rue,$code_postal,$ville,$estAsso);
        $this->actionnaires = $actionnaires;
    }


}