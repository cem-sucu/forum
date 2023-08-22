<?php 

namespace Model\Entities;

use APP\Entity;

final class Sujet extends Entity{

    private $id;
    private $titre;
    private $date_creation;
    private $verouiller;
    private $categorie_id;
    private $utilisateur_id;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of date_creation
     */ 
    public function getDate_creation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of date_creation
     *
     * @return  self
     */ 
    public function setDate_creation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Get the value of verouiller
     */ 
    public function getVerouiller()
    {
        return $this->verouiller;
    }

    /**
     * Set the value of verouiller
     *
     * @return  self
     */ 
    public function setVerouiller($verouiller)
    {
        $this->verouiller = $verouiller;

        return $this;
    }

    /**
     * Get the value of categorie_id
     */ 
    public function getCategorie_id()
    {
        return $this->categorie_id;
    }

    /**
     * Set the value of categorie_id
     *
     * @return  self
     */ 
    public function setCategorie_id($categorie_id)
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }

    /**
     * Get the value of utilisateur_id
     */ 
    public function getUtilisateur_id()
    {
        return $this->utilisateur_id;
    }

    /**
     * Set the value of utilisateur_id
     *
     * @return  self
     */ 
    public function setUtilisateur_id($utilisateur_id)
    {
        $this->utilisateur_id = $utilisateur_id;

        return $this;
    }
}


?>