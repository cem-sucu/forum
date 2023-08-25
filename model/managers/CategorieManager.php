<?php

namespace Model\Managers;//->définit le namespace dans lequel la classe CategorieManager est définie. Un namespace permet d'organiser et de regrouper des classes et des fonctions liées par leur fonction ou domaine

use App\Manager;//-> Cette ligne importe la classe Manager du namespace App.

use Model\Managers\CategorieManager; //->Cette ligne importe la classe CategorieManager du même namespace

use App\DAO; //-> Cette ligne importe la classe DAO du namespace App

class CategorieManager extends Manager{

    protected $className = "Model\Entities\Categorie";
    protected $tableName = "categorie";

    public function __construct()
    {
        parent::connect();
    }
}


?>