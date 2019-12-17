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
     * @param int|null $id
     * @param string $nom
     * @param string $rue
     * @param string $code_postal
     * @param string $ville
     * @param bool $estAsso
     * @param int $donateurs
     */
    public function __construct(?int $id,string $nom, string $rue, string $code_postal, string $ville, bool $estAsso, int $donateurs)
    {
        parent::__construct($id, $nom, $rue, $code_postal, $ville, $estAsso);
        $this->donateurs = $donateurs;
    }

    /**
     * @return int
     */
    public function getDonateurs(): int
    {
        return $this->donateurs;
    }

    /**
     * @param int $donateurs
     */
    public function setDonateurs(int $donateurs): void
    {
        $this->donateurs = $donateurs;
    }




}