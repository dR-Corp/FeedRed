<?php

/**
 * class Users

 */
class Users {

    private $idUser;
    private $nom;
    private $prenom;
    private $email;
    private $adresse;
    private $telephone;
    private $password;
    private $profil;
    private $etat;
    private $certification;
    
    public function getIdUser() {
        return $this->idUser;
    }
    public function setIdUser($id) {
        $this->idUser = $id;
    }

    public function getNom() {
        return $this->nom;
    }
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }

    public function getAdresse() {
        return $this->adresse;
    }
    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getEtat() {
        return $this->etat;
    }
    public function setEtat($etat) {
        $this->etat = $etat;
    }
    
    public function getProfil() {
        return $this->profil;
    }
    public function setProfil($profil) {
        $this->profil = $profil;
    }

    public function getTelephone() {
        return $this->telephone;
    }
    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    public function getCertification() {
        return $this->certification;
    }
    public function setCertification($certification) {
        $this->certification = $certification;
    }

}