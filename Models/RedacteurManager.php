<?php
/**
 * 
 * class RedacteurManager
 * Access to the model and manage the database
 */

class RedacteurManager {

    private $bdd;

    public function __construct() {
        $this->bdd = MyAutoload::dbconnect();
    }

    public function findAll() {

        $bdd = $this->bdd;
        $redacteurs = [];

        /*** Accès au model */
        $query = "SELECT * FROM redacteur";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $redacteur = new Redacteur();
            $redacteur->setIdRedacteur($row['idRedacteur']);
            $redacteur->setIdUser($row['idUser']);
            $redacteur->setArticle($row['article']);

            $redacteurs[] = $redacteur;

        };

        return $redacteurs;
    }

    public function find($idRedacteur) {
        
        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM redacteur WHERE idRedacteur= :idRedacteur";
        $req = $bdd->prepare($query);
        $req->bindValue(':idRedacteur', $idRedacteur, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);

        $redacteur = new Redacteur();
        
        if($row) {
            $redacteur->setIdRedacteur($row['idRedacteur']);
            $redacteur->setIdUser($row['idUser']);
            $redacteur->setArticle($row['article']);  
        }
        
        return $redacteur;

    }

    public function read($idUser) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM redacteur WHERE idUser= :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $redacteur = new Redacteur();
        $redacteur->setIdRedacteur($row['idRedacteur']);
        $redacteur->setIdUser($row['idUser']);
        $redacteur->setArticle($row['article']);

        return $redacteur;

    }

    public function save($values) {

        $bdd = $this->bdd;

        if(isset($values['idRedacteur'])) {
            $query = "UPDATE redacteur SET idUser = :idUser WHERE idRedacteur = :idRedacteur";
        }
        else {
            $query = "INSERT INTO redacteur (idRedacteur, idUser) VALUES (NULL, :idUser)";
        }
        
        $req = $bdd->prepare($query);

        if(isset($values['idRedacteur'])) $req->bindValue(':idRedacteur', $values['idRedacteur'], PDO::PARAM_INT);
        $req->bindValue(':idUser', $values['idUser'], PDO::PARAM_INT);

        $req->execute();

    }

    public function delete($idRedacteur) {

        $bdd = $this->bdd;

        $query = "DELETE FROM redacteur WHERE idRedacteur= :idRedacteur";
        $req = $bdd->prepare($query);
        $req->bindValue(':idRedacteur', $idRedacteur, PDO::PARAM_INT);
        $req->execute();

    }

    public function deleteUser($idUser) {

        $bdd = $this->bdd;

        $query = "DELETE FROM redacteur WHERE idUser= :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();

    }

    public function getNbrRedacteur() {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM redacteur");

		return $select->rowCount();

    }

}