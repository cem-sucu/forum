<?php

namespace Model\Managers;

use App\Manager;
use Model\Managers\CategorieManager;
use App\DAO;

class CategorieManager extends Manager{

    protected $className = "Model\Entities\Categorie";
    protected $tableName = "categorie";

    public function __construct()
    {
        parent::connect();
    }
}


?>