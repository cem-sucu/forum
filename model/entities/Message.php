<?php

namespace Model\Entities;

use App\Entity;

final class Message extends Entity{
    
    private $id;
    private $texte;
    private $date_creation;
    private $sujet_id;
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
     * Get the value of texte
     */ 
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set the value of texte
     *
     * @return  self
     */ 
    public function setTexte($texte)
    {
        $this->texte = $texte;

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
     * Get the value of sujet_id
     */ 
    public function getSujet_id()
    {
        return $this->sujet_id;
    }

    /**
     * Set the value of sujet_id
     *
     * @return  self
     */ 
    public function setSujet_id($sujet_id)
    {
        $this->sujet_id = $sujet_id;

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