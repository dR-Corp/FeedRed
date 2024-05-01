<?php

/**
 * class Admin

 */
class Admin {

    private $idAdmin;
    private $idUser;
    
    public function getIdAdmin() {
        return $this->idAdmin;
    }
    public function setIdAdmin($id) {
        $this->idAdmin = $id;
    }

    public function getIdUser() {
        return $this->idUser;
    }
    public function setIdUser($id) {
        $this->idUser = $id;
    }

}