<?php
/**
 * 
 * class UsersManager
 * Access to the model and manage the database
 */

class AdminManager {

    private $bdd;

    public function __construct() {
        $this->bdd = MyAutoload::dbconnect();
    }

    public function findAll() {

        $bdd = $this->bdd;
        $admins = [];

        /*** Accès au model */
        $query = "SELECT * FROM admin";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $admin = new Admin();
            $admin->setIdAdmin($row['idAdmin']);
            $admin->setIdUser($row['idUser']);

            $admins[] = $admin;

        };

        return $admins;
    }

    public function find($idAdmin) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM admin WHERE idAdmin= :idAdmin";
        $req = $bdd->prepare($query);
        $req->bindValue(':idAdmin', $idAdmin, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $admin = new Admin();
        $admin->setIdAdmin($row['idAdmin']);
        $admin->setIdUser($row['idUser']);

        return $admin;

    }

    public function read($idUser) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM admin WHERE idUser= :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $admin = new Admin();
        $admin->setIdAdmin($row['idAdmin']);
        $admin->setIdUser($row['idUser']);

        return $admin;

    }

    public function save($values) {

        $bdd = $this->bdd;

        if(isset($values['idAdmin'])) {
            $query = "UPDATE admin SET idUser = :idUser WHERE idAdmin = :idAdmin";
        }
        else {
            $query = "INSERT INTO admin (idAdmin, idUser) VALUES (NULL, :idUser)";
        }
        
        $req = $bdd->prepare($query);

        if(isset($values['idAdmin'])) $req->bindValue(':idAdmin', $values['idAdmin'], PDO::PARAM_INT);
        $req->bindValue(':idUser', $values['idUser'], PDO::PARAM_INT);

        $req->execute();

    }

    public function delete($idAdmin) {

        $bdd = $this->bdd;

        $query = "DELETE FROM admin WHERE idAdmin= :idAdmin";
        $req = $bdd->prepare($query);
        $req->bindValue(':idAdmin', $idAdmin, PDO::PARAM_INT);
        $req->execute();

    }

    public function deleteUser($idUser) {

        $bdd = $this->bdd;

        $query = "DELETE FROM admin WHERE idUser= :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();

    }

}