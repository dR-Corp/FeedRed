<?php

/**
 * class Redaction
 * 
 */
class Redaction {

    private $idRedaction;
    private $idArticle;
    private $idRedacteur;
    private $dateValidation;
    private $etat;
    private $nbrMots;
    private $fichier;

    public function getIdRedaction() {
        return $this->idRedaction;
    }
    public function setIdRedaction($id) {
        $this->idRedaction = $id;
    }

    public function getIdArticle() {
        return $this->idArticle;
    }
    public function setIdArticle($idArticle) {
        $this->idArticle = $idArticle;
    }

    public function getIdRedacteur() {
        return $this->idRedacteur;
    }
    public function setIdRedacteur($idRedacteur) {
        $this->idRedacteur = $idRedacteur;
    }
    
    public function getDateValidation() {
        return $this->DateValidation;
    }
    public function setDateValidation($dateValidation) {
        $this->dateValidation = $dateValidation;
    }
    
    public function getNbrMots() {
        return $this->mot;
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

}