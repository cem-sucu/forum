<?php 

namespace Model\Entities;

use APP\Entity;

final class Sujet extends Entity{

    private $id;
    private $titre;
    private $dateCreation;
    private $verouiller;
    private $categorie;
    private $utilisateur;

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
     * Get the value of dateCreation
     */ 
    public function getDateCreation()
    {
        return $this->dateCreation->format("D-m-y, H:i");
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */ 
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = new \DateTime($dateCreation);

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
     * Get the value of categorie
     */ 
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */ 
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get the value of utilisateur
     */ 
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set the value of utilisateur
     *
     * @return  self
     */ 
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}


?>