<?php

/**
 * class Client

 */
class Client {

    private $idClient;
    private $idUser;
    
    public function getIdClient() {
        return $this->idClient;
    }
    public function setIdClient($id) {
        $this->idClient = $id;
    }

    public function getIdUser() {
        return $this->idUser;
    }
    public function setIdUser($id) {
        $this->idUser = $id;
    }

}