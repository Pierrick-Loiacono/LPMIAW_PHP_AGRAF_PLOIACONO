<?php

namespace POO\Entity;

require_once('Structure.php');

class Association extends Structure
{
    /**
     * @var string
     */
    private $donateurs;

    /**
     * Association constructor.
     * @param string $nom
     * @param string $rue
     * @param string $code_postal
     * @param string $ville
     * @param bool $estAsso
     * @param string $donateurs
     */
    public function __construct(string $nom, string $rue, string $code_postal, string $ville, bool $estAsso, string $donateurs)
    {
        parent::__construct($nom, $rue, $code_postal, $ville, $estAsso);
        $this->donateurs = $donateurs;
    }

    /**
     * @return string
     */
    public function getDonateurs(): string
    {
        return $this->donateurs;
    }

    /**
     * @param string $donateurs
     */
    public function setDonateurs(string $donateurs): void
    {
        $this->donateurs = $donateurs;
    }

    


}