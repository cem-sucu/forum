<?php 

namespace Model\Entities;

use APP\Entity;

final class Utilisateur extends Entity{

    private $id;
    private $pseudonyme;
    private $MotsDePasse;
    private $date_inscription;
    private $email;
    private $role;

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
     * Get the value of pseudonyme
     */ 
    public function getPseudonyme()
    {
        return $this->pseudonyme;
    }

    /**
     * Set the value of pseudonyme
     *
     * @return  self
     */ 
    public function setPseudonyme($pseudonyme)
    {
        $this->pseudonyme = $pseudonyme;

        return $this;
    }

    /**
     * Get the value of MotsDePasse
     */ 
    public function getMotsDePasse()
    {
        return $this->MotsDePasse;
    }

    /**
     * Set the value of MotsDePasse
     *
     * @return  self
     */ 
    public function setMotsDePasse($MotsDePasse)
    {
        $this->MotsDePasse = $MotsDePasse;

        return $this;
    }

    /**
     * Get the value of date_inscription
     */ 
    public function getDate_inscription()
    {
        return $this->date_inscription;
    }

    /**
     * Set the value of date_inscription
     *
     * @return  self
     */ 
    public function setDate_inscription($date_inscription)
    {
        $this->date_inscription = $date_inscription;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }
} 

?>