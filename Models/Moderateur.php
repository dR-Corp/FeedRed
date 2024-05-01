<?php

/**
 * class Mederateur

 */
class Moderateur {

    private $idModerateur;
    private $idUser;
    
    public function getIdModerateur() {
        return $this->idModerateur;
    }
    public function setIdModerateur($id) {
        $this->idModerateur = $id;
    }

    public function getIdUser() {
        return $this->idUser;
    }
    public function setIdUser($id) {
        $this->idUser = $id;
    }

}