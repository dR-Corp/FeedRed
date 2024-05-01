<?php

/**
 * class Article
 * 
 */
class Article {

    private $idArticle;
    private $titre;
    private $description;
    private $liens;
    private $nbrMots;
    private $etat;
    private $delai;
    private $redacteur;
    private $date_limit_other;
    private $created_at;
    private $updated_at;
    private $urgence;
    private $idClient;
    
    private $ton;
    private $style;
    private $type;
    private $plan;

    public function getIdArticle() {
        return $this->idArticle;
    }
    public function setIdArticle($id) {
        $this->idArticle = $id;
    }

    public function getTitre() {
        return $this->titre;
    }
    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function getDescription() {
        return $this->description;
    }
    public function setDescription($description) {
        $this->description = $description;
    }

    public function getLiens() {
        return $this->liens;
    }
    public function setLiens($liens) {
        $this->liens = $liens;
    }

    public function getNbrMots() {
        return $this->nbrMots;
    }
    public function setNbrMots($nbrMots) {
        $this->nbrMots = $nbrMots;
    }
    
    public function getEtat() {
        return $this->etat;
    }
    public function setEtat($etat) {
        $this->etat = $etat;
    }
    
    public function getDelai() {
        return $this->delai;
    }
    public function setDelai($delai) {
        $this->delai = $delai;
    }

    public function getRedacteur() {
        return $this->redacteur;
    }
    public function setRedacteur($redacteur) {
        $this->redacteur = $redacteur;
    }

    public function getDateLimit() {
        return $this->date_limit_other;
    }
    public function setDateLimit($date_limit_other) {
        $this->date_limit_other = $date_limit_other;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }
    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }
    public function getUpdatedAt() {
        return $this->updated_at;
    }
    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }

    public function getUrgence() {
        return $this->urgence;
    }
    public function setUrgence($urgence) {
        $this->urgence = $urgence;
    }

    public function getIdClient() {
        return $this->idClient;
    }
    public function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    public function getTon() {
        return $this->ton;
    }
    public function setTon($ton) {
        $this->ton = $ton;
    }

    public function getStyle() {
        return $this->style;
    }
    public function setStyle($style) {
        $this->style = $style;
    }

    public function getType() {
        return $this->type;
    }
    public function setType($type) {
        $this->type = $type;
    }

    public function getPlan() {
        return $this->plan;
    }
    public function setPlan($plan) {
        $this->plan = $plan;
    }

}