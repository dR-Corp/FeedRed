<?php
/**
 * 
 * class ClientManager
 * Access to the model and manage the database
 */

class ClientManager {

    private $bdd;

    public function __construct() {
        $this->bdd = MyAutoload::dbconnect();
    }

    public function findAll() {

        $bdd = $this->bdd;
        $clients = [];

        /*** Accès au model */
        $query = "SELECT * FROM client";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $client = new Client();
            $client->setIdClient($row['idClient']);
            $client->setIdUser($row['idUser']);

            $clients[] = $client;

        };

        return $clients;
    }

    public function find($idClient) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM client WHERE idClient= :idClient";
        $req = $bdd->prepare($query);
        $req->bindValue(':idClient', $idClient, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $client = new Client();
        if($row) {
            $client->setIdClient($row['idClient']);
            $client->setIdUser($row['idUser']);
        }

        return $client;

    }

    public function read($idUser) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM client WHERE idUser= :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $client = new Client();
        $client->setIdClient($row['idClient']);
        $client->setIdUser($row['idUser']);

        return $client;

    }

    public function save($values) {

        $bdd = $this->bdd;

        if(isset($values['idClient'])) {
            $query = "UPDATE client SET idUser = :idUser WHERE idClient = :idClient";
        }
        else {
            $query = "INSERT INTO client (idClient, idUser) VALUES (NULL, :idUser)";
        }
        
        $req = $bdd->prepare($query);

        if(isset($values['idClient'])) $req->bindValue(':idClient', $values['idClient'], PDO::PARAM_INT);
        $req->bindValue(':idUser', $values['idUser'], PDO::PARAM_INT);

        $req->execute();

    }

    public function delete($idClient) {

        $bdd = $this->bdd;

        $query = "DELETE FROM client WHERE idClient= :idClient";
        $req = $bdd->prepare($query);
        $req->bindValue(':idClient', $idClient, PDO::PARAM_INT);
        $req->execute();

    }

    public function deleteUser($idUser) {

        $bdd = $this->bdd;

        $query = "DELETE FROM client WHERE idUser= :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();

    }

    public function getNbrClient() {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM client");

		return $select->rowCount();

    }

}