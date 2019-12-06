<?php

namespace POO\Entity;

require_once(__DIR__.'/../Modele/managers/PDOManager.php');
require_once(__DIR__.'/../Modele/entities/Entity.php');

use PDO;
use POO\Modele\managers\PDOManager;

abstract class AdminController
{
    //protected PDOManager $manager;
    protected $manager;

    /**
     * @return PDOManager
     */
    public function getManager(): PDOManager
    {
        return $this->manager;
    }

    /**
     * @param PDOManager $manager
     */
    public function setManager(PDOManager $manager): void
    {
        $this->manager = $manager;
    }

    /**
     * @param int $id
     * @return Entity
     */
    public function findById(int $id): ?Entity
    {
        return($this->getManager()->findById($id));
    }

    /**
     * @return \PDOStatement
     */
    public function find(): \PDOStatement
    {
        return($this->getManager()->find());
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return($this->getManager()->findAll(PDO::FETCH_ASSOC));
    }

    /**
     * @param Entity $e
     */
    public function insert(Entity $e): void
    {
        $this->getManager()->insert($e);
    }
}