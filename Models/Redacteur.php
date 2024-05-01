<?php

/**
 * class Redacteur
 * 
 */
class Redacteur {

    private $idRedacteur;
    private $idUser;
    private $article;
    
    public function getIdRedacteur() {
        return $this->idRedacteur;
    }
    public function setIdRedacteur($id) {
        $this->idRedacteur = $id;
    }

    public function getIdUser() {
        return $this->idUser;
    }
    public function setIdUser($id) {
        $this->idUser = $id;
    }

    public function getArticle() {
        return $this->article;
    }
    public function setArticle($id) {
        $this->article = $id;
    }

}