<?php
/**
 * 
 * class ModerateurManager
 * Access to the model and manage the database
 */

class ModerateurManager {

    private $bdd;

    public function __construct() {
        $this->bdd = MyAutoload::dbconnect();
    }

    public function findAll() {

        $bdd = $this->bdd;
        $moderateurs = [];

        /*** Accès au model */
        $query = "SELECT * FROM moderateur";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $moderateur = new Moderateur();
            $moderateur->setIdModerateur($row['idModerateur']);
            $moderateur->setIdUser($row['idUser']);

            $moderateurs[] = $moderateur;

        };

        return $moderateurs;
    }

    public function find($idModerateur) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM moderateur WHERE idModerateur= :idModerateur";
        $req = $bdd->prepare($query);
        $req->bindValue(':idModerateur', $idModerateur, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $moderateur = new Moderateur();
        if($row) {
            $moderateur->setIdModerateur($row['idModerateur']);
            $moderateur->setIdUser($row['idUser']);
        }

        return $moderateur;

    }

    public function read($idUser) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM moderateur WHERE idUser= :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $moderateur = new Moderateur();
        $moderateur->setIdModerateur($row['idModerateur']);
        $moderateur->setIdUser($row['idUser']);

        return $moderateur;

    }

    public function save($values) {

        $bdd = $this->bdd;

        if(isset($values['idModerateur'])) {
            $query = "UPDATE moderateur SET idUser = :idUser WHERE idModerateur = :idModerateur";
        }
        else {
            $query = "INSERT INTO moderateur (idModerateur, idUser) VALUES (NULL, :idUser)";
        }
        
        $req = $bdd->prepare($query);

        if(isset($values['idModerateur'])) $req->bindValue(':idModerateur', $values['idModerateur'], PDO::PARAM_INT);
        $req->bindValue(':idUser', $values['idUser'], PDO::PARAM_INT);

        $req->execute();

    }

    public function delete($idModerateur) {

        $bdd = $this->bdd;

        $query = "DELETE FROM moderateur WHERE idModerateur= :idModerateur";
        $req = $bdd->prepare($query);
        $req->bindValue(':idModerateur', $idModerateur, PDO::PARAM_INT);
        $req->execute();

    }

    public function deleteUser($idUser) {

        $bdd = $this->bdd;

        $query = "DELETE FROM moderateur WHERE idUser= :idUser";
        $req = $bdd->prepare($query);
        $req->bindValue(':idUser', $idUser, PDO::PARAM_INT);
        $req->execute();

    }

    public function getNbrModerateur() {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM moderateur");

		return $select->rowCount();

    }

}