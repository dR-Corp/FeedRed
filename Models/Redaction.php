<?php

/**
 * class Redaction
 * 
 */
class Redaction {

    private $idRedaction;
    private $idArticle;
    private $idRedacteur;
    private $idModerateur;
    private $dateRedaction;
    private $dateValidation;
    private $etat;
    private $nbrMots;
    private $fichier;
    private $fichierCorrection;
    private $correction;
    private $raisons;
    private $tauxPlagia;
    private $siteTaux;
    private $references;
    private $idClient;

    private $red;

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

    public function getIdModerateur() {
        return $this->idModerateur;
    }
    public function setIdModerateur($idModerateur) {
        $this->idModerateur = $idModerateur;
    }

    public function getDateRedaction() {
        return $this->dateRedaction;
    }
    public function setDateRedaction($dateRedaction) {
        $this->dateRedaction = $dateRedaction;
    }
    
    public function getDateValidation() {
        return $this->dateValidation;
    }
    public function setDateValidation($dateValidation) {
        $this->dateValidation = $dateValidation;
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

    public function getFichier() {
        return $this->fichier;
    }
    public function setFichier($fichier) {
        $this->fichier = $fichier;
    }

    public function getFichierCorrection() {
        return $this->fichierCorrection;
    }
    public function setFichierCorrection($fichierCorrection) {
        $this->fichierCorrection = $fichierCorrection;
    }

    public function getCorrection() {
        return $this->correction;
    }
    public function setCorrection($correction) {
        $this->correction = $correction;
    }
    public function getRaisons() {
        return $this->raisons;
    }
    public function setRaisons($raisons) {
        $this->raisons = $raisons;
    }

    public function getTauxPlagia() {
        return $this->tauxPlagia;
    }
    public function setTauxPlagia($tauxPlagia) {
        $this->tauxPlagia = $tauxPlagia;
    }

    public function getSiteTaux() {
        return $this->siteTaux;
    }
    public function setSiteTaux($siteTaux) {
        $this->siteTaux = $siteTaux;
    }

    public function getReferences() {
        return $this->references;
    }
    public function setReferences($references) {
        $this->references = $references;
    }

    public function getIdClient() {
        return $this->idClient;
    }
    public function setIdClient($idClient) {
        $this->idClient = $idClient;
    }

    public function getRed() {
        return $this->red;
    }
    public function setRed($red) {
        $this->red = $red;
    }
    
}