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

}