<?php

/**
 * 
 * class RedactionManager
 * Access to the model and manage the database
 */

class RedactionManager {

    private $bdd;
    private $sql_details;

    public function __construct() {
        $this->bdd = MyAutoload::dbconnect();
        $this->sql_details = MyAutoload::sql_details();
    }

    public function findAll() {

        $bdd = $this->bdd;
        $redactions = [];
        /*** Accès au model */
        $query = "SELECT * FROM redaction ORDER BY created_at DESC"; //Revoir s'il faut dispatcher validé et non validé
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $redaction = new Redaction();
            $redaction->setIdRedaction($row['idRedaction']);
            $redaction->setIdArticle($row['idArticle']);
            $redaction->setIdRedacteur($row['idRedacteur']);
            $redaction->setDateValidation($row['dateValidation']);
            $redaction->setDateRedaction($row['dateRedaction']);
            $redaction->setEtat($row['etat']);
            $redaction->setNbrMots($row['nbrMots']);
            $redaction->setFichier($row['fichier']);
            $redaction->setCorrection($row['correction']);
            $redaction->setRaisons($row['raisons']);
            $redaction->setTauxPlagia($row['tauxPlagia']);
            $redaction->setSiteTaux($row['siteTaux']);
            $redaction->setReferences($row['references']);
            $redaction->setIdClient($row['idClient']);
            $redaction->setRed($row['red']);

            $redactions[] = $redaction;

        };

        return $redactions;
    }

    public function findAllUrgent() {

        $bdd = $this->bdd;  
        $redactions = [];
        /*** Accès au model */
        $query = "SELECT * FROM redaction, article WHERE redaction.idArticle=article.idArticle AND article.urgence=1 ORDER BY redaction.created_at DESC"; //Revoir s'il faut dispatcher validé et non validé
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $redaction = new Redaction();
            $redaction->setIdRedaction($row['idRedaction']);
            $redaction->setIdArticle($row['idArticle']);
            $redaction->setIdRedacteur($row['idRedacteur']);
            $redaction->setDateValidation($row['dateValidation']);
            $redaction->setDateRedaction($row['dateRedaction']);
            $redaction->setEtat($row['etat']);
            $redaction->setNbrMots($row['nbrMots']);
            $redaction->setFichier($row['fichier']);
            $redaction->setCorrection($row['correction']);
            $redaction->setRaisons($row['raisons']);
            $redaction->setTauxPlagia($row['tauxPlagia']);
            $redaction->setSiteTaux($row['siteTaux']);
            $redaction->setReferences($row['references']);
            $redaction->setIdClient($row['idClient']);
            $redaction->setRed($row['red']);

            $redactions[] = $redaction;

        };

        return $redactions;
    }

    public function findValidable() {

        $bdd = $this->bdd;
        $redactions = [];
        /*** Accès au model */
        $query = "SELECT * FROM redaction WHERE (etat IS NULL OR etat=2) GROUP BY idArticle ORDER BY created_at DESC"; //Revoir s'il faut dispatcher validé et non validé
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $redaction = new Redaction();
            $redaction->setIdRedaction($row['idRedaction']);
            $redaction->setIdArticle($row['idArticle']);
            $redaction->setIdRedacteur($row['idRedacteur']);
            $redaction->setDateValidation($row['dateValidation']);
            $redaction->setDateRedaction($row['dateRedaction']);
            $redaction->setEtat($row['etat']);
            $redaction->setNbrMots($row['nbrMots']);
            $redaction->setFichier($row['fichier']);
            $redaction->setCorrection($row['correction']);
            $redaction->setRaisons($row['raisons']);
            $redaction->setTauxPlagia($row['tauxPlagia']);
            $redaction->setSiteTaux($row['siteTaux']);
            $redaction->setReferences($row['references']);
            $redaction->setIdClient($row['idClient']);
            $redaction->setRed($row['red']);

            $redactions[] = $redaction;

        };

        return $redactions;
    }

    public function SSProcessing($table, $filter = null, $where = null, $data_table=null) {
        // DB table to use
        // $table = 'redaction';

        // Table's primary key
        $primaryKey = 'idRedaction';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'idRedaction', 'dt' => 'idRedaction' ),
            array( 'db' => 'titre', 'dt' => 'titre' ),
            array(
                'db'        => 'idRedacteur',   
                'dt'        => 'idRedacteur',
                'formatter' => function( $d, $row ) {
                    if(isset($d)) {
                        $red = (new RedacteurManager())->find($d);
                        $user = (new UsersManager())->find($red->getIdUser());
                        return array($user->getIdUser(), $user->getNom()." ".$user->getPrenom());
                    }
                    return "";
                }
            ),
            array (
                'db'        => 'idModerateur',
                'dt'        => 'idModerateur',
                'formatter' => function( $d, $row ) {
                    if(isset($d)) {
                        $mod = (new ModerateurManager())->find($row['idModerateur']);
                        $use_mod = (new UsersManager())->find($mod->getIdUser());
                        return array($mod->getIdUser(), $use_mod->getNom()." ".$use_mod->getPrenom());
                    }
                    return "";
                }
            ),
            array(
                'db'        => 'dateValidation',
                'dt'        => 'dateValidation',
                'formatter' => function( $d, $row ) {
                    $date = new DateTime($d);
                    return $date->format('d-m-Y');
                }
            ),
            array(
                'db'        => 'dateRedaction',
                'dt'        => 'dateRedaction',
                'formatter' => function( $d, $row ) {
                    $date = new DateTime($d);
                    return $date->format('d-m-Y');
                }
            ),
            array( 'db' => 'etat', 'dt' => 'etat' ),
            array( 'db' => 'nbrMots', 'dt' => 'nbrMots' ),
            array( 'db' => 'fichier', 'dt' => 'fichier' ),
            array( 'db' => 'fichierCorrection', 'dt' => 'fichierCorrection' ),
            array( 'db' => 'correction', 'dt' => 'correction' ),
            array( 'db' => 'raisons', 'dt' => 'raisons' ),
            array( 'db' => 'tauxPlagia', 'dt' => 'tauxPlagia' ),
            array( 'db' => 'siteTaux', 'dt' => 'siteTaux' ),
            array( 'db' => 'references', 'dt' => 'references' ),
            array( 'db' => 'urgence', 'dt' => 'urgence' ),
            array( 'db' => 'red', 'dt' => 'red' )
        );
        
        $_GET['join'] = true;

        $redactions = SSP::complex( $_GET, $this->sql_details, $table, $primaryKey, $columns, $filter, $where, $data_table );

        return $redactions;
    }

    public function getAllResponse() {
        $table = 'redaction';
        return self::SSProcessing($table, null, null);
    }
    public function getAllUrgentResponse() {
        $table = 'redaction';
        $where = 'article.`urgence` = 1';
        return self::SSProcessing($table, null, $where);
    }
    public function getAvalideResponse() {
        $table = 'redaction';
        $where = 'redaction.`etat` IS NULL';
        return self::SSProcessing($table, null, $where);
    }
    public function getNonvalideResponse() {
        $table = 'redaction';
        $where = 'redaction.`etat` = 2';
        return self::SSProcessing($table, null, $where);
    }
    public function getValideResponse() {
        $table = 'redaction';
        $where = 'redaction.`etat` = 1';
        return self::SSProcessing($table, null, $where);
    }
    public function getRefuseResponse() {
        $table = 'redaction';
        $where = 'redaction.`etat` = 3';
        return self::SSProcessing($table, null, $where);
    }

    public function getAllResponseCli($id) {
        $table = 'redaction';
        $where = '(redaction.`etat` = 1 OR redaction.`etat` = 5 OR redaction.`etat` = 2) AND redaction.`idClient` = '.$id;
        return self::SSProcessing($table, null, $where);
    }
    public function getValideResponseCli($id) {
        $table = 'redaction';
        $where = 'redaction.`etat` = 1 AND redaction.`idClient` = '.$id;
        return self::SSProcessing($table, null, $where);
    }
    public function getAvalideResponseCli($id) {
        $table = 'redaction';
        $where = 'redaction.`etat` = 4 AND redaction.`idClient` = '.$id;
        return self::SSProcessing($table, null, $where);
    }
    public function getNonvalideResponseCli($id) {
        $table = 'redaction';
        $where = 'redaction.`etat` = 2 AND redaction.`idClient` = '.$id;
        // return self::SSProcessing($table, null, $where);
    }

    public function getValideResponse_() {

        $bdd = $this->bdd;
        $redactions = [];
        /*** Accès au model */
        $query = "SELECT * FROM redaction WHERE etat=1 GROUP BY idArticle ORDER BY created_at DESC LIMIT 200"; //Revoir s'il faut dispatcher validé et non validé
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $date1 = new DateTime($row['dateValidation']);
            $date2 = new DateTime($row['dateRedaction']);

            //get redacteur Info
            $red = (new RedacteurManager())->find($row['idRedacteur']);
            $use = (new UsersManager())->find($red->getIdUser());
            $nom = $use->getNom();
            $prenom = $use->getPrenom();

            //get moderateur info
            $mod = (new ModerateurManager())->find($row['idModerateur']);
            $use_mod = (new UsersManager())->find($mod->getIdUser());
            $nom_mod = $use_mod->getNom();
            $prenom_mod = $use_mod->getPrenom();

            $art = (new ArticleManager())->find($row['idArticle']);
            $titre = $art->getTitre();
            $urgence = $art->getUrgence();

            $redaction = array(
                
                "idRedaction" => $row['idRedaction'],
                "article" => array($row['idArticle'], $titre),
                "redacteur" => array($red->getIdUser(), $nom." ".$prenom),
                "moderateur" => array($mod->getIdUser(), $nom_mod." ".$prenom_mod),
                "dateValidation" => $date1->format('d/m/Y'),
                "dateRedaction" => $date2->format('d/m/Y'),
                "etat" => $row['etat'],
                "nbrMots" => $row['nbrMots'],
                "fichier" => $row['fichier'],
                "fichierCorrection" => $row['fichierCorrection'],
                "correction" => $row['correction'],
                "raisons" => $row['raisons'],
                "tauxPlagia" => $row['tauxPlagia'],
                "siteTaux" => $row['siteTaux'],
                "references" => $row['references'],
                "urgence" => $urgence,
                "red" => $red,
            );

            $redactions[] = $redaction;

        };

        return $redactions;

    }

    public function getAvalideResponse_() {

        $bdd = $this->bdd;
        $redactions = [];
        /*** Accès au model */
        $query = "SELECT * FROM redaction WHERE etat IS NULL GROUP BY idArticle ORDER BY created_at ASC LIMIT 200"; //Revoir s'il faut dispatcher validé et non validé
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $date1 = new DateTime($row['dateValidation']);
            $date2 = new DateTime($row['dateRedaction']);
   
            $red = (new RedacteurManager())->find($row['idRedacteur']);
            $use = (new UsersManager())->find($red->getIdUser());
            $nom = $use->getNom();
            $prenom = $use->getPrenom();

            $art = (new ArticleManager())->find($row['idArticle']);
            $titre = $art->getTitre();
            $urgence = $art->getUrgence();

            $redaction = array(
                
                "idRedaction" => $row['idRedaction'],
                "article" => array($row['idArticle'], $titre),
                "redacteur" => array($red->getIdUser(), $nom." ".$prenom),
                "dateValidation" => $date1->format('d/m/Y'),
                "dateRedaction" => $date2->format('d/m/Y'),
                "etat" => $row['etat'],
                "nbrMots" => $row['nbrMots'],
                "fichier" => $row['fichier'],
                "fichierCorrection" => $row['fichierCorrection'],
                "correction" => $row['correction'],
                "raisons" => $row['raisons'],
                "tauxPlagia" => $row['tauxPlagia'],
                "siteTaux" => $row['siteTaux'],
                "references" => $row['references'],
                "urgence" => $urgence,
                "red" => $red,
            );

            $redactions[] = $redaction;

        };

        return $redactions;

    }

    public function getNonvalideResponse_() {

        $bdd = $this->bdd;
        $redactions = [];
        /*** Accès au model */
        $query = "SELECT * FROM redaction WHERE etat=2 GROUP BY idArticle ORDER BY created_at ASC"; //Revoir s'il faut dispatcher validé et non validé
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $date1 = new DateTime($row['dateValidation']);
            $date2 = new DateTime($row['dateRedaction']);

            //get redacteur infos
            $red = (new RedacteurManager())->find($row['idRedacteur']);
            $use = (new UsersManager())->find($red->getIdUser());
            $nom = $use->getNom();
            $prenom = $use->getPrenom();

            //get moderateur infos
            $mod = (new ModerateurManager())->find($row['idModerateur']);
            $use_mod = (new UsersManager())->find($mod->getIdUser());
            $nom_mod = $use_mod->getNom();
            $prenom_mod = $use_mod->getPrenom();

            $art = (new ArticleManager())->find($row['idArticle']);
            $titre = $art->getTitre();
            $urgence = $art->getUrgence();

            $redaction = array(
                
                "idRedaction" => $row['idRedaction'],
                "article" => array($row['idArticle'], $titre),
                "redacteur" => array($red->getIdUser(), $nom." ".$prenom),
                "moderateur" => array($mod->getIdUser(), $nom_mod." ".$prenom_mod),
                "dateValidation" => $date1->format('d/m/Y'),
                "dateRedaction" => $date2->format('d/m/Y'),
                "etat" => $row['etat'],
                "nbrMots" => $row['nbrMots'],
                "fichier" => $row['fichier'],
                "fichierCorrection" => $row['fichierCorrection'],
                "correction" => $row['correction'],
                "raisons" => $row['raisons'],
                "tauxPlagia" => $row['tauxPlagia'],
                "siteTaux" => $row['siteTaux'],
                "references" => $row['references'],
                "urgence" => $urgence,
                "red" => $red,
            );

            $redactions[] = $redaction;

        };

        return $redactions;

    }

    public function getRefuseResponse_() {

        $bdd = $this->bdd;
        $redactions = [];
        /*** Accès au model */
        $query = "SELECT * FROM redaction WHERE etat=3 GROUP BY idArticle ORDER BY created_at DESC"; //Revoir s'il faut dispatcher validé et non validé
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $date1 = new DateTime($row['dateValidation']);
            $date2 = new DateTime($row['dateRedaction']);

            $red = (new RedacteurManager())->find($row['idRedacteur']);
            $use = (new UsersManager())->find($red->getIdUser());
            $nom = $use->getNom();
            $prenom = $use->getPrenom();

            $art = (new ArticleManager())->find($row['idArticle']);
            $titre = $art->getTitre();
            $urgence = $art->getUrgence();

            $redaction = array(
                
                "idRedaction" => $row['idRedaction'],
                "article" => array($row['idArticle'], $titre),
                "redacteur" => array($red->getIdUser(), $nom." ".$prenom),
                "dateValidation" => $date1->format('d/m/Y'),
                "dateRedaction" => $date2->format('d/m/Y'),
                "etat" => $row['etat'],
                "nbrMots" => $row['nbrMots'],
                "fichier" => $row['fichier'],
                "fichierCorrection" => $row['fichierCorrection'],
                "correction" => $row['correction'],
                "raisons" => $row['raisons'],
                "tauxPlagia" => $row['tauxPlagia'],
                "siteTaux" => $row['siteTaux'],
                "references" => $row['references'],
                "urgence" => $urgence,
                "red" => $red,
            );

            $redactions[] = $redaction;

        };

        return $redactions;

    }

    public function findRedaction($idRedacteur) {

        $bdd = $this->bdd;
        $redactions = [];
        /*** Accès au model */
        $query = "SELECT * FROM redaction WHERE idRedacteur=:idRedacteur AND (etat IS NULL OR etat=2 OR etat=3 OR etat=4) ORDER BY created_at DESC";
        // $query2 = "SELECT * FROM redaction WHERE idRedacteur=:idRedacteur AND etat=2 ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        // $req2 = $bdd->prepare($query2);
        $req->bindValue(':idRedacteur', $idRedacteur, PDO::PARAM_INT);
        // $req2->bindValue(':idRedacteur', $idRedacteur, PDO::PARAM_INT);
        $req->execute();
        // $req2->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $redaction = new Redaction();
            $redaction->setIdRedaction($row['idRedaction']);
            $redaction->setIdArticle($row['idArticle']);
            $redaction->setIdRedacteur($row['idRedacteur']);
            $redaction->setDateValidation($row['dateValidation']);
            $redaction->setDateRedaction($row['dateRedaction']);
            $redaction->setEtat($row['etat']);
            $redaction->setNbrMots($row['nbrMots']);
            $redaction->setFichier($row['fichier']);
            $redaction->setCorrection($row['correction']);
            $redaction->setRaisons($row['raisons']);
            $redaction->setTauxPlagia($row['tauxPlagia']);
            $redaction->setSiteTaux($row['siteTaux']);
            $redaction->setReferences($row['references']);
            $redaction->setIdClient($row['idClient']);
            $redaction->setRed($row['red']);

            $redactions[] = $redaction;

        };
        
        // echo '<pre>'; print_r($redactions); exit;
        return $redactions;
    }

    public function findRedacteurRedactions($idRedacteur, $moisFacture) {

        $bdd = $this->bdd;
        $redactions = [];
        $periode = $this->getPeriodeByDateDebut($moisFacture);
        $moisFactureFin = $periode['dateFin'];
        // $moisFactureFin = date('Y-m-t', strtotime($moisFacture));
        /*** Accès au model */
        if($moisFactureFin == NULL)
        $query = "SELECT * FROM redaction WHERE idRedacteur=:idRedacteur AND etat=1 AND dateValidation >= '$moisFacture' GROUP BY idArticle ORDER BY created_at DESC";
        else
        $query = "SELECT * FROM redaction WHERE idRedacteur=:idRedacteur AND etat=1 AND dateValidation >= '$moisFacture' AND dateValidation <= '$moisFactureFin' GROUP BY idArticle ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        
        $req->bindValue(':idRedacteur', $idRedacteur, PDO::PARAM_INT);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $redaction = new Redaction();
            $redaction->setIdRedaction($row['idRedaction']);
            $redaction->setIdArticle($row['idArticle']);
            $redaction->setIdRedacteur($row['idRedacteur']);
            $redaction->setDateValidation($row['dateValidation']);
            $redaction->setDateRedaction($row['dateRedaction']);
            $redaction->setEtat($row['etat']);
            $redaction->setNbrMots($row['nbrMots']);
            $redaction->setFichier($row['fichier']);
            $redaction->setCorrection($row['correction']);
            $redaction->setRaisons($row['raisons']);
            $redaction->setTauxPlagia($row['tauxPlagia']);
            $redaction->setSiteTaux($row['siteTaux']);
            $redaction->setReferences($row['references']);
            $redaction->setIdClient($row['idClient']);
            $redaction->setRed($row['red']);

            $redactions[] = $redaction;

        };

        return $redactions;
    }

    public function findModerateurRedactions($idModerateur, $moisFacture) {

        $bdd = $this->bdd;
        $redactions = [];
        $periode = $this->getPeriodeByDateDebut($moisFacture);
        $moisFactureFin = $periode['dateFin'];
        // $moisFactureFin = date('Y-m-t', strtotime($moisFacture));
        /*** Accès au model */
        
        if($moisFactureFin == NULL)
            $query = "SELECT * FROM redaction WHERE idModerateur=:idModerateur AND etat=1 AND dateValidation >= '$moisFacture' GROUP BY idArticle ORDER BY created_at DESC";
        else
            $query = "SELECT * FROM redaction WHERE idModerateur=:idModerateur AND etat=1 AND dateValidation >= '$moisFacture' AND dateValidation <= '$moisFactureFin' GROUP BY idArticle ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        $req->bindValue(':idModerateur', $idModerateur, PDO::PARAM_INT);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $redaction = new Redaction();
            $redaction->setIdRedaction($row['idRedaction']);
            $redaction->setIdArticle($row['idArticle']);
            $redaction->setIdRedacteur($row['idRedacteur']);
            $redaction->setIdModerateur($row['idModerateur']);
            $redaction->setDateValidation($row['dateValidation']);
            $redaction->setDateRedaction($row['dateRedaction']);
            $redaction->setEtat($row['etat']);
            $redaction->setNbrMots($row['nbrMots']);
            $redaction->setFichier($row['fichier']);
            $redaction->setFichierCorrection($row['fichierCorrection']);
            $redaction->setCorrection($row['correction']);
            $redaction->setRaisons($row['raisons']);
            $redaction->setTauxPlagia($row['tauxPlagia']);
            $redaction->setSiteTaux($row['siteTaux']);
            $redaction->setReferences($row['references']);
            $redaction->setIdClient($row['idClient']);
            $redaction->setRed($row['red']);

            $redactions[] = $redaction;

        };

        return $redactions;
    }

    public function findModerateurNbrValidation($idModerateur, $moisFacture) {

        $bdd = $this->bdd;
        $redactions = [];

        $periode = $this->getPeriodeByDateDebut($moisFacture);
        $moisFactureFin = $periode['dateFin'];
        // $moisFactureFin = date('Y-m-t', strtotime($moisFacture));
        /*** Accès au model */
        
		if($moisFactureFin == NULL)
        $select = $bdd->query("SELECT * FROM redaction WHERE idModerateur='$idModerateur' AND etat=1 AND dateValidation >= '$moisFacture' GROUP BY idArticle ORDER BY created_at DESC");
        else
            $select = $bdd->query("SELECT * FROM redaction WHERE idModerateur='$idModerateur' AND etat=1 AND dateValidation >= '$moisFacture' AND dateValidation <= '$moisFactureFin' GROUP BY idArticle ORDER BY created_at DESC");
        return $select->rowCount();
    }

    public function findRedacteurNbrMotsRediges($idRedacteur, $moisFacture) {//passer ici en second paramètre le mois, par défaut c'est le mois actuel

        $bdd = $this->bdd;
        $nbrMots = 0;
        
        $periode = $this->getPeriodeByDateDebut($moisFacture);
        $moisFactureFin = $periode['dateFin'];
        // echo '<pre>'; $moisFactureFin == NULL ? print_r('dddd') : print_r($moisFactureFin);
        // $moisFactureFin = date('Y-m-d', strtotime($moisFactureFin));
        // $moisFactureFin = date('Y-m-t', strtotime($moisFacture));

        /*** Accès au model */
        if($moisFactureFin == NULL)
            $query = "SELECT * FROM redaction WHERE idRedacteur=:idRedacteur AND etat=1 AND dateValidation >= '$moisFacture' GROUP BY idArticle ORDER BY created_at DESC";
        else
            $query = "SELECT * FROM redaction WHERE idRedacteur=:idRedacteur AND etat=1 AND dateValidation >= '$moisFacture' AND dateValidation <= '$moisFactureFin' GROUP BY idArticle ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        $req->bindValue(':idRedacteur', $idRedacteur, PDO::PARAM_INT);
        $req->execute();
        
        $manager = new ArticleManager();
        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $article = $manager->find($row['idArticle']);

            $nbrMots = $nbrMots + $article->getNbrMots();

        };

        return array(
            "nbrRedactions" => $req->rowCount(),
            "nbrMots" => $nbrMots,
        );
    }

    public function findValide($idRedacteur) {

        $bdd = $this->bdd;
        $redactions = [];
        /*** Accès au model */
        $query = "SELECT * FROM redaction WHERE etat=1 AND idRedacteur=:idRedacteur ORDER BY created_at DESC ";
        $req = $bdd->prepare($query);
        $req->bindValue(':idRedacteur', $idRedacteur, PDO::PARAM_INT);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $redaction = new Redaction();
            $redaction->setIdRedaction($row['idRedaction']);
            $redaction->setIdArticle($row['idArticle']);
            $redaction->setIdRedacteur($row['idRedacteur']);
            $redaction->setDateValidation($row['dateValidation']);
            $redaction->setDateRedaction($row['dateRedaction']);
            $redaction->setEtat($row['etat']);
            $redaction->setNbrMots($row['nbrMots']);
            $redaction->setFichier($row['fichier']);
            $redaction->setCorrection($row['correction']);
            $redaction->setRaisons($row['raisons']);
            $redaction->setTauxPlagia($row['tauxPlagia']);
            $redaction->setSiteTaux($row['siteTaux']);
            $redaction->setReferences($row['references']);
            $redaction->setIdClient($row['idClient']);
            $redaction->setRed($row['red']);

            $redactions[] = $redaction;

        };

        return $redactions;
    }

    public function find($idRedaction) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM redaction WHERE idRedaction= :idRedaction";
        $req = $bdd->prepare($query);
        $req->bindValue(':idRedaction', $idRedaction, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
        // echo '<pre>'; print_r($idRedaction);
        // echo '<pre>'; print_r($row); exit;
    
        $redaction = new Redaction();
        $redaction->setIdRedaction($row['idRedaction']);
        $redaction->setIdArticle($row['idArticle']);
        $redaction->setIdRedacteur($row['idRedacteur']);
        $redaction->setDateValidation($row['dateValidation']);
        $redaction->setDateRedaction($row['dateRedaction']);
        $redaction->setEtat($row['etat']);
        $redaction->setNbrMots($row['nbrMots']);
        $redaction->setFichier($row['fichier']);
        $redaction->setCorrection($row['correction']);
        $redaction->setRaisons($row['raisons']);
        $redaction->setTauxPlagia($row['tauxPlagia']);
        $redaction->setSiteTaux($row['siteTaux']);
        $redaction->setReferences($row['references']);
        $redaction->setIdClient($row['idClient']);
        $redaction->setRed($row['red']);

        return $redaction;

    }

    public function correction($values) {

        $bdd = $this->bdd;

        $fichier = $_FILES['values'];

        if(isset($fichier)) {

            if($fichier["error"]['fichier']==0) {

                $extension = pathinfo($fichier['name']['fichier'])['extension'];
                $extensions_autorisees = array('docx', 'txt');

                if(in_array($extension, $extensions_autorisees)) {

                    move_uploaded_file($fichier['tmp_name']['fichier'], STORAGE.basename(date('Y-m-d-h-i-s')."".$fichier['name']['fichier']));
                    $fichier_name = basename(date('Y-m-d-h-i-s')."".$fichier['name']['fichier']);

                    if(isset($values['idRedaction'])) {
                        $query = "UPDATE redaction SET dateValidation = NOW(), idModerateur = :idModerateur, fichierCorrection = :fichierCorrection, etat = :etat WHERE idRedaction = :idRedaction";
                    }
                    $req = $bdd->prepare($query);
                    
                    if(isset($values['idRedaction'])) {

                        $red = $this->find($values['idRedaction']);
                        $redCLI = $red->getIdClient();
                        
                        $etat = $redCLI == 0 ? 1 : 4;
                        $req->bindValue(':idRedaction', $values['idRedaction'], PDO::PARAM_INT);
                        $req->bindValue(':fichierCorrection', $fichier_name, PDO::PARAM_STR);
                        $req->bindValue(':idModerateur', $values['idModerateur'], PDO::PARAM_STR);
                        $req->bindValue(':etat', $etat, PDO::PARAM_INT);
                        $req->execute();
    
                        $_SESSION['alert'] = "success";
                        $_SESSION['alert_message'] = "Correction soumise aves succès !";

                    }

                }
                else {
                    $_SESSION['alert'] = 'error';
			        $_SESSION['alert_message'] = 'Ce type de fichier n\'est pas autorisés ! Choisissez un document word, ou un fichier texte le cas échéant';
                }
            }
            else {
                $error1 = $fichier["error"]['fichier'];
                $_SESSION['alert'] = 'error';
			    $_SESSION['alert_message'] = 'Une erreur est survenue pendant le chargement du fichier. "'.$error1;
            }
        }
        else {
            $_SESSION['alert'] = 'error';
			$_SESSION['alert_message'] = 'Aucun fichier n\'a été sélectionné !';
        }
    }

    public function save($values) {

        // echo '<pre>'; print_r($values); exit;
        
        $bdd = $this->bdd;
        $fichier = $_FILES['values'];

        if(isset($fichier)) {
            if($fichier["error"]['fichier']==0) {

                $extension = pathinfo($fichier['name']['fichier'])['extension'];
                $extensions_autorisees = array('docx', 'txt');

                if(in_array($extension, $extensions_autorisees)) {

                    move_uploaded_file($fichier['tmp_name']['fichier'], STORAGE.basename(date('Y-m-d-h-i-s')."".$fichier['name']['fichier']));
                    $fichier_name = basename(date('Y-m-d-h-i-s')."".$fichier['name']['fichier']);

                    if(isset($values['idRedaction'])) {
                        $query = "UPDATE redaction SET dateRedaction = NOW(), nbrMots = :nbrMots, fichier = :fichier, etat = :etat, tauxPlagia = :tauxPlagia, siteTaux = :siteTaux, redaction.references = :references  WHERE idRedaction = :idRedaction";
                    }
                    else {
                        $query = "INSERT INTO redaction (idRedaction, idArticle, idRedacteur, dateRedaction, nbrMots, fichier, tauxPlagia, siteTaux, redaction.references, idClient) VALUES (NULL, :idArticle, :idRedacteur, NOW(), :nbrMots, :fichier, :tauxPlagia, :siteTaux, :references, :idClient)";
                    }
                    $req = $bdd->prepare($query);
                    
                    if(isset($values['idRedaction'])) {
                        $req->bindValue(':idRedaction', $values['idRedaction'], PDO::PARAM_INT);
                        $req->bindValue(':etat', NULL, PDO::PARAM_INT);
                    }
                    if(!isset($values['idRedaction'])) {
                        $req->bindValue(':idArticle', $values['idArticle'], PDO::PARAM_INT);
                        $req->bindValue(':idRedacteur', $values['idRedacteur'], PDO::PARAM_INT);

                        $id = $values['idArticle'];
                        $art = ($bdd->query("SELECT * FROM article WHERE idArticle = '$id'"))->fetch();
                        $idClient = $art['idClient'];
                        $req->bindValue(':idClient', $idClient, PDO::PARAM_STR);
                    }
                    $req->bindValue(':nbrMots', $values['nbrMots'], PDO::PARAM_STR);
                    $req->bindValue(':fichier', $fichier_name, PDO::PARAM_STR);
                    $req->bindValue(':tauxPlagia', $values['tauxPlagia'], PDO::PARAM_STR);
                    $req->bindValue(':siteTaux', $values['siteTaux'], PDO::PARAM_STR);
                    $req->bindValue(':references', $values['references'], PDO::PARAM_STR);
        
                    $req->execute();

                    if(!isset($values['idRedaction'])) {
                        $manage = new ArticleManager();
                        $manage->writtedArticle($values);
                    }

                    $_SESSION['alert'] = "success";
                    $_SESSION['alert_message'] = "Article soumis aves succès !";
                }
                else {
                    $_SESSION['alert'] = 'error';
			        $_SESSION['alert_message'] = 'Ce type de fichier n\'est pas autorisés ! Choisissez un document word, ou un fichier texte le cas échéant';
                }
            }
            else {
                $error1 = $fichier["error"]['fichier'];
                $_SESSION['alert'] = 'error';
			    $_SESSION['alert_message'] = 'Une erreur est survenue pendant le chargement du fichier. "'.$error1;
            }
        }
        else {
            $_SESSION['alert'] = 'error';
			$_SESSION['alert_message'] = 'Aucun fichier n\'a été sélectionné !';
        }

    }

    public function saveCli($values) {

        $bdd = $this->bdd;

        $query = "INSERT INTO redaction (idRedaction, idArticle, idRedacteur, dateRedaction, nbrMots, fichier, idClient, red, etat) 
                                VALUES (NULL, :idArticle, :idRedacteur, NOW(), :nbrMots, :fichier, :idClient, :red, :etat)";
      
        $req = $bdd->prepare($query);

        $red = $values['red'];
        $nbrMots = str_word_count($red);
        $titre = $values['titre'];

        // Create a new PHPWord object
        $PHPWord = new \PhpOffice\PhpWord\PhpWord();
        // Add a section to the document
        $section = $PHPWord->addSection();

        $blocks = explode("\n", $red);

        // Loop through the blocks and add them to the section
        foreach ($blocks as $block) {
            
            if(isset($block)) {
                // Add the block as a new heading level 2
                // $section->addText($block);
                $section->addText($block." ", array('name'=>'Times New Roman', 'size'=>12,'bold' => false),array('spaceAfter' => 10));
                // Add a text break after each block
                $section->addTextBreak();
            }

        }

        // Save the document as a .docx file
        $fichier_name = basename(date('Y_m_d_h_i_s')."".str_replace(' ', '_', $titre).".docx");
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007');
        $objWriter->save(STORAGE.$fichier_name);
                
        $req->bindValue(':idArticle', $values['idArticle'], PDO::PARAM_INT);
        $req->bindValue(':idRedacteur', 0, PDO::PARAM_INT);

        $req->bindValue(':idClient', $values['idClient'], PDO::PARAM_STR);
        $req->bindValue(':nbrMots', $nbrMots, PDO::PARAM_STR);
        $req->bindValue(':fichier', $fichier_name, PDO::PARAM_STR);
        $req->bindValue(':red', $red, PDO::PARAM_STR);
        $req->bindValue(':etat', 5, PDO::PARAM_INT);

        $req->execute();

        //marquer l'article comme redigé
        $manage = new ArticleManager();
        $manage->writtedArticle([
            'idArticle' => $values['idArticle'],
            'idRedacteur' => 0
        ]);

        $_SESSION['alert'] = "success"; 
        $_SESSION['alert_message'] = "Un article a été redigé !";

        return $bdd->lastInsertId();

    }

    public function valider($values) {

        $bdd = $this->bdd;

        $red = $this->find($values['idRedaction']);
        $redCLI = $red->getIdClient();
        $etat = ($redCLI == 0) ? 1 : (isset($_SESSION['idModerateur']) ? 4 : 1);
        $mod = isset($_SESSION['idModerateur']) ? $values['idModerateur'] : $red->getIdModerateur();

        $query = "UPDATE redaction SET dateValidation = NOW(), etat = :etat, idModerateur = :idModerateur WHERE idRedaction = :idRedaction";
        $req = $bdd->prepare($query);
        $req->bindValue(':etat', $etat, PDO::PARAM_INT);
        $req->bindValue(':idModerateur', $mod, PDO::PARAM_INT);
        $req->bindValue(':idRedaction', $values['idRedaction'], PDO::PARAM_INT);
        $req->execute();

    }

    public function corriger($values) {

        $bdd = $this->bdd;

        if(isset($values['values'])) {
            $correction = $values['values']['correction'];
            $moderateur = $values['values']['idModerateur'];
            $redaction = $values['values']['idRedaction'];
        }
        else {
            $correction = $values['correction'];
            $moderateur = $values['idModerateur'];
            $redaction = $values['idRedaction'];
        }

        $id = $redaction;
        $redIDCLI = ($bdd->query("SELECT * FROM redaction WHERE idRedaction = '$id'"))->fetch();
        $redClient = $redIDCLI['idClient'] == 0 ? false : true;

        if(!$redClient) {
            $query = "UPDATE redaction SET correction = :correction, idModerateur = :idModerateur, etat= :etat WHERE idRedaction = :idRedaction";
            $req = $bdd->prepare($query);
            $req->bindValue(':correction', $correction, PDO::PARAM_STR);
            $req->bindValue(':idModerateur', $moderateur, PDO::PARAM_INT);
            $req->bindValue(':idRedaction', $redaction, PDO::PARAM_INT);
            $req->bindValue(':etat', 2, PDO::PARAM_INT);
            $req->execute();
        }
        else {
            $query = "UPDATE redaction SET correction = :correction, etat= :etat WHERE idRedaction = :idRedaction";
            $req = $bdd->prepare($query);
            $req->bindValue(':correction', $correction, PDO::PARAM_STR);
            $req->bindValue(':idRedaction', $redaction, PDO::PARAM_INT);
            $req->bindValue(':etat', 2, PDO::PARAM_INT);
            $req->execute();
        }

    }

    public function refuser($values) {

        $bdd = $this->bdd;

        if(isset($values['values'])) {
            $raisons = $values['values']['raisons'];
            $moderateur = $values['values']['idModerateur'];
            $redaction = $values['values']['idRedaction'];
        }
        else {
            $raisons = $values['raisons'];
            $moderateur = $values['idModerateur'];
            $redaction = $values['idRedaction'];
        }

        $query = "UPDATE redaction SET raisons = :raisons, idModerateur = :idModerateur, etat= :etat WHERE idRedaction = :idRedaction";
        $req = $bdd->prepare($query);
        $req->bindValue(':raisons', $raisons, PDO::PARAM_STR);
        $req->bindValue(':idModerateur', $moderateur, PDO::PARAM_INT);
        $req->bindValue(':idRedaction', $redaction, PDO::PARAM_INT);
        $req->bindValue(':etat', 3, PDO::PARAM_INT);
        $req->execute();

    }

    public function optimiser ($values) {

    }

    public function delete($idRedaction) {

        $bdd = $this->bdd;

        $query = "DELETE FROM redaction WHERE idRedaction= :idRedaction";
        $req = $bdd->prepare($query);
        $req->bindValue(':idRedaction', $idRedaction, PDO::PARAM_INT);
        $req->execute();

    }

    public function getNbrRedaction($id) {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM redaction WHERE idRedacteur='$id' ");

		return $select->rowCount();

    }

    public function getNbrRedactionS($id) {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM redaction WHERE idRedacteur='$id' AND etat IS NULL ");

		return $select->rowCount();

    }

    public function getNbrRedactionV($id) {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM redaction WHERE idRedacteur='$id' AND etat=1 ");

		return $select->rowCount();

    }

    public function getNbrRedactionN($id) {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM redaction WHERE idRedacteur='$id' AND etat=2 ");

		return $select->rowCount();

    }

    public function getNbrRedac() {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM redaction");

		return $select->rowCount();

    }

    public function getNbrRedacV($id) {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM redaction WHERE idModerateur='$id' AND etat=1 ");

		return $select->rowCount();

    }

    public function getNbrRedacN($id) {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM redaction WHERE idModerateur='$id' AND etat=2 ");

		return $select->rowCount();

    }

    public function getNbrUrgentRedaction() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction, article WHERE redaction.idArticle=article.idArticle AND article.urgence=1");
		return $select->rowCount();
    }
    public function getNbrUrgentRedactionCli($id) {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction, article WHERE redaction.idArticle=article.idArticle AND article.urgence=1");
		return $select->rowCount();
    }
    public function getNbrTousRedaction() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction");
		return $select->rowCount();
    }
    public function getNbrValidableRedaction() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction WHERE (etat IS NULL OR etat=2)");
		return $select->rowCount();
    }
    public function getNbrTousRedactionCli($id) {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction WHERE idClient = '$id' AND (etat=4 OR etat=2 OR etat=1)");
		return $select->rowCount();
    }
    public function getNbrValidableRedactionCli($id) {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction,article WHERE (redaction.etat IS NULL OR redaction.etat=2) AND article.idClient = '$id'");
		return $select->rowCount();
    }
    public function getNbrValideRedaction() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction WHERE etat=1");
		return $select->rowCount();
    }
    public function getNbrValideRedactionCli($id) {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction WHERE etat=1 AND idClient = '$id'");
		return $select->rowCount();
    }
    public function getNbrRefuseRedaction() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction WHERE etat=3");
		return $select->rowCount();
    }
    public function getNbrRefuseRedactionCli($id) {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction,article WHERE redaction.etat=3 AND article.idClient = '$id'");
		return $select->rowCount();
    }
    public function getNbrAvalideRedaction() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction WHERE etat IS NULL");
		return $select->rowCount();
    }
    public function getNbrAvalideRedactionCli($id) {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction WHERE etat = 4 AND idClient = '$id'");
		return $select->rowCount();
    }
    public function getNbrNonvalideRedaction() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction WHERE etat=2");
		return $select->rowCount();
    }
    public function getNbrNonvalideRedactionCli($id) {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM redaction WHERE etat=2 AND idClient = '$id'");
		return $select->rowCount();
    }

    //Dashboard management
    public function getBarChartData() {

        $bdd = $this->bdd;
        // ON RECUPERE TOUTES LES REDACTIONS
        $select = $bdd->query("SELECT * FROM redaction WHERE etat = 1 ORDER BY dateRedaction ASC");
        $redacts = $select->fetchAll();
        // ON LES REGROUPE PAR ANNEE
        // on get les anneeMois
   
        $datevalidations = [];
        $datevalidationsComp = [];

        foreach($redacts as $redact) {
            $explodedDate = explode('-', $redact['dateRedaction']);
            $datevalidation = $explodedDate[0]."-".$explodedDate[1];
            $datevalidation2 = $explodedDate[0]."-".$explodedDate[1]."-";
            $datevalidations[] = $datevalidation;
            $datevalidationsComp[] = $datevalidation2;
        }
        //anneeMois, unique
        $yearsMonth = array_values(array_unique($datevalidations));
        $yearsMonthComp = array_values(array_unique($datevalidationsComp));

        //the nomber of articles redacted
        $yearsMonthArticles = [];
        //the number of words redacted 
        $yearsMonthWords = [];
        //on regroupe les redactions de chaque mois
        $redactionsMonth = [];

        for($i = 0; $i < count($yearsMonthComp); $i++) {
            $nbrArticles = 0;
            $nbrWords = 0;
            $monthReds = [];
            foreach($redacts as $redact) {
                if(strpos($redact['dateRedaction'], $yearsMonthComp[$i]) !== false) {
                    $nbrArticles++;
                    $nbrWords += $redact['nbrMots'];
                    $monthReds[] = $redact;
                }
            }
            $redactionsMonth[] = $monthReds;
            $yearsMonthArticles[] = $nbrArticles;
            $yearsMonthWords[] = $nbrWords;
        }

        //dans yearsMont, transformer les chiffres mois en nom mois

        $monthName = [
            '01' => 'Janvier',
            '02' => 'Février',
            '03' => 'Mars',
            '04' => 'Avril',
            '05' => 'Mai',
            '06' => 'Juin',
            '07' => 'Juillet',
            '08' => 'Août',
            '09' => 'Septembre',
            '10' => 'Octobre',
            '11' => 'Novembre',
            '12' => 'Décembre',
        ];
        $yearsMonthName = [];
        foreach($yearsMonth as $month) {
            $val = explode('-', $month);
            $yearsMonthName[] = $monthName[$val[1]].' '.$val[0];
        }

        //Liste des redacteurs de la plateforme
        $redacteurManager = new RedacteurManager();
        $redacteurs = $redacteurManager->findAll();

        // Les stats pour le best redacteur de chaque mois
        $bestReds = [];
        $idRed = 0;
        foreach($redactionsMonth as $redactionMonth) {
            $reds_nbr = [];
            foreach($redacteurs as $redacteur) {                    
                                    
                $id = $redacteur->getIdRedacteur();                 
                $redTotal = 0;

                foreach($redactionMonth as $redaction) {
                    if($id == $redaction['idRedacteur']) {
                        $redTotal++;
                    }
                }

                $reds_nbr[$id] = $redTotal;
                
            }
            
            // $bestReds['ids'][];
            // $users = (new UsersManager())->find($redacteur['idUser']);
            // $name = $users->getNom().' '.$users->getPrenom();
            // $bestReds['names'][];
            $max = max($reds_nbr);
            $idRed = array_search($max, $reds_nbr);
            $red = (new RedacteurManager())->find($idRed);
            $users = (new UsersManager())->find($red->getIdUser());

            $bestReds['idReds'][] = $idRed;
            $bestReds['names'][] = $users->getNom().' '.$users->getPrenom();
            $bestReds['nbrReds'][] = $max;

        }

        // $bestReds = [
        //     "a" => 4,
        //     "da" => 5,
        //     "ko" => 15,
        //     "pitch" => 10,
        //     "body" => 0,
        //     "drew" => 30
        // ];

        return [
            'yearsMonth' => $yearsMonth,
            'yearsMonthName' => $yearsMonthName,
            'articles' => $yearsMonthArticles,
            'words' => $yearsMonthWords,
            'totalMots' => array_sum($yearsMonthWords),
            'totalArticles' => array_sum($yearsMonthArticles),
            'redactionsMonth' => $redactionsMonth,
            'bestReds' => $bestReds,
        ];
    }

    //Dashboard management for the clients, they will be crazy
    public function getBarChartDataCli() {

        $bdd = $this->bdd;
        // ON RECUPERE TOUTES LES REDACTIONS
        $idClient = $_SESSION['idClient'];
        $select = $bdd->query("SELECT * FROM redaction,article WHERE redaction.idArticle=article.idArticle AND article.idClient='$idClient' AND redaction.etat = 1 ORDER BY dateRedaction ASC");
        $redacts = $select->fetchAll();
        // ON LES REGROUPE PAR ANNEE
        // on get les anneeMois
   
        $datevalidations = [];
        $datevalidationsComp = [];

        foreach($redacts as $redact) {
            $explodedDate = explode('-', $redact['dateRedaction']);
            $datevalidation = $explodedDate[0]."-".$explodedDate[1];
            $datevalidation2 = $explodedDate[0]."-".$explodedDate[1]."-";
            $datevalidations[] = $datevalidation;
            $datevalidationsComp[] = $datevalidation2;
        }
        //anneeMois, unique
        $yearsMonth = array_values(array_unique($datevalidations));
        $yearsMonthComp = array_values(array_unique($datevalidationsComp));

        //the nomber of articles redacted
        $yearsMonthArticles = [];
        //the number of words redacted 
        $yearsMonthWords = [];
        //on regroupe les redactions de chaque mois
        $redactionsMonth = [];

        for($i = 0; $i < count($yearsMonthComp); $i++) {
            $nbrArticles = 0;
            $nbrWords = 0;
            $monthReds = [];
            foreach($redacts as $redact) {
                if(strpos($redact['dateRedaction'], $yearsMonthComp[$i]) !== false) {
                    $nbrArticles++;
                    $nbrWords += $redact['nbrMots'];
                    $monthReds[] = $redact;
                }
            }
            $redactionsMonth[] = $monthReds;
            $yearsMonthArticles[] = $nbrArticles;
            $yearsMonthWords[] = $nbrWords;
        }

        //dans yearsMont, transformer les chiffres mois en nom mois

        $monthName = [
            '01' => 'Janvier',
            '02' => 'Février',
            '03' => 'Mars',
            '04' => 'Avril',
            '05' => 'Mai',
            '06' => 'Juin',
            '07' => 'Juillet',
            '08' => 'Août',
            '09' => 'Septembre',
            '10' => 'Octobre',
            '11' => 'Novembre',
            '12' => 'Décembre',
        ];
        $yearsMonthName = [];
        foreach($yearsMonth as $month) {
            $val = explode('-', $month);
            $yearsMonthName[] = $monthName[$val[1]].' '.$val[0];
        }

        //Liste des redacteurs de la plateforme
        $redacteurManager = new RedacteurManager();
        $redacteurs = $redacteurManager->findAll();

        // Les stats pour le best redacteur de chaque mois
        $bestReds = [];
        $idRed = 0;
        foreach($redactionsMonth as $redactionMonth) {
            $reds_nbr = [];
            foreach($redacteurs as $redacteur) {                    
                                    
                $id = $redacteur->getIdRedacteur();                 
                $redTotal = 0;

                foreach($redactionMonth as $redaction) {
                    if($id == $redaction['idRedacteur']) {
                        $redTotal++;
                    }
                }

                $reds_nbr[$id] = $redTotal;
                
            }
            
            // $bestReds['ids'][];
            // $users = (new UsersManager())->find($redacteur['idUser']);
            // $name = $users->getNom().' '.$users->getPrenom();
            // $bestReds['names'][];
            $max = max($reds_nbr);
            $idRed = array_search($max, $reds_nbr);
            $red = (new RedacteurManager())->find($idRed);
            $users = (new UsersManager())->find($red->getIdUser());

            $bestReds['idReds'][] = $idRed;
            $bestReds['names'][] = $users->getNom().' '.$users->getPrenom();
            $bestReds['nbrReds'][] = $max;

        }

        // $bestReds = [
        //     "a" => 4,
        //     "da" => 5,
        //     "ko" => 15,
        //     "pitch" => 10,
        //     "body" => 0,
        //     "drew" => 30
        // ];

        return [
            'yearsMonth' => $yearsMonth,
            'yearsMonthName' => $yearsMonthName,
            'articles' => $yearsMonthArticles,
            'words' => $yearsMonthWords,
            'totalMots' => array_sum($yearsMonthWords),
            'totalArticles' => array_sum($yearsMonthArticles),
            'redactionsMonth' => $redactionsMonth,
            'bestReds' => $bestReds,
        ];
    }

    /**
     * 
     * FACTURE MANAGEMENT
     * 
     * */
    public function getAllPeriode() {

        $bdd = $this->bdd;
        $periodes = [];
        
        $query = "SELECT * FROM periode ORDER BY idPeriode DESC"; //on ordonnera par ordre inverse de creation
        $req = $bdd->prepare($query);
        $req->execute();

        return $periodes = $req->fetchAll();

    }
    public function findPeriode($id) {
        $bdd = $this->bdd;
        $query = "SELECT * FROM periode WHERE idPeriode = '$id'";
        $req = $bdd->prepare($query);
        $req->execute();
        return $periode = $req->fetch();
    }

    public function getPeriodeByDateDebut($dateDebut) {
        $bdd = $this->bdd;
        $query = "SELECT * FROM periode WHERE dateDebut = '$dateDebut'";
        $req = $bdd->prepare($query);
        $req->execute();
        return $periode = $req->fetch();
    }
    public function getPeriodeByDateFin($dateFin) {
        $bdd = $this->bdd;
        $query = "SELECT * FROM periode WHERE dateFin = '$dateFin'";
        $req = $bdd->prepare($query);
        $req->execute();
        return $periode = $req->fetch();
    }

    public function getActivePeriode() {
        $bdd = $this->bdd;
        $query = "SELECT * FROM periode WHERE encours = 1";
        $req = $bdd->prepare($query);
        $req->execute();
        return $periode = $req->fetch();
    }
    public function getPeriodeRedaction($dateRedaction) {
        $bdd = $this->bdd;
        $query = "SELECT * FROM periode ";
        $req = $bdd->prepare($query);
        $req->execute();
        $periodes = $req->fetchAll();
        foreach($periodes as $periode) {
            if($periode['dateFin'] != NULL) {
                if($periode['dateDebut'] <= $dateRedaction && $periode['dateFin'] >= $dateRedaction)
                    return $periode;
            }
            else {
                if($periode['dateDebut'] <= $dateRedaction)  
                    return $periode;
            }
        }
    }

    public function validateFacture($values) {
        $bdd = $this->bdd;
        extract($values);
        // echo '<pre>'; print_r($params); exit;
        $query = "INSERT INTO facture (idFacture, idRedacteur, nbrArticles, nbrMots, dateValidation, idPeriode) VALUES (NULL, :idRedacteur, :nbrArticles, :nbrMots, NOW(), :idPeriode)";
        $req = $bdd->prepare($query);
        $req->bindValue(':idRedacteur', $params['idRedacteur'], PDO::PARAM_INT);
        $req->bindValue(':nbrArticles', $params['nbrArticles'], PDO::PARAM_STR);
        $req->bindValue(':nbrMots', $params['nbrMots'], PDO::PARAM_INT);
        $req->bindValue(':idPeriode', $params['idPeriode'], PDO::PARAM_INT);
        $req->execute();

    }

    public function factureIsValidate($idPeriode, $idRedacteur) {
        $bdd = $this->bdd;
        $query = "SELECT * FROM facture WHERE idPeriode = '$idPeriode' AND idRedacteur = '$idRedacteur'";
        $req = $bdd->prepare($query);
        $req->execute();
        return $req->rowCount();
    }

    public function endPeriode($values) {
        $dateDebut = (new RedactionManager)->getActivePeriode()['dateDebut'];
        $dateFin = date('Y-m-d');
        // echo '<pre>'; print_r(date("Y-m-d", strtotime($dateFin.'+1day')));exit;
        $deb = date('d/m/Y', strtotime($dateDebut));
        $fin = date('d/m/Y', strtotime($dateFin));
        $libelle = $deb .' au '.$fin;

        $bdd = $this->bdd;

        //on finalise la periode en cours
        $query = "UPDATE periode SET libelle = '$libelle', dateFin = '$dateFin', encours = 0 WHERE dateDebut = '$dateDebut' ";
        $req = $bdd->prepare($query);
        $req->execute();

        //on créee une nouvelle période

        //revoir après le code pour tenir compte de l'heure, et dans ce cas c'est la date à la seconde d'après on notera
        $dateDeb = date("Y-m-d", strtotime($dateFin.'+1day')); //le lendemain de la date de fin precedente pour le moment, un jour de plus donc
        $lib = 'Du '.date('d/m/Y', strtotime($dateDeb));

        $query = "INSERT INTO periode (idPeriode, libelle, dateDebut, dateFin, encours) VALUES (NULL, :libelle, :dateDebut, NULL, :encours)";
        $req = $bdd->prepare($query);
        $req->bindValue(':libelle', $lib, PDO::PARAM_STR);
        $req->bindValue(':dateDebut', $dateDeb, PDO::PARAM_STR);
        $req->bindValue(':encours', 1, PDO::PARAM_BOOL);
        $req->execute();


        // $query = "SELECT * FROM periode WHERE encours = 1";
        // $req = $bdd->prepare($query);
        // $req->execute();
    }

    public function exportFiche($values) {
        $bdd = $this->bdd;
        $idPeriode = $values['idPeriode'];
        $query = "SELECT * FROM facture WHERE idPeriode = '$idPeriode' ";
        $req = $bdd->prepare($query);
        $req->execute();

        $factures = $req->fetchAll();
        $data = [];
        foreach($factures as $facture) {
            $redacteur = (new UsersManager)->find((new RedacteurManager)->find($facture['idRedacteur'])->getIdUser());
            $data[] = [
                "ID DE LA FACTURE" => $facture['idFacture'],
                "REDACTEUR" => $redacteur->getNom().' '.$redacteur->getPrenom(),
                "TELEPHONE" => $redacteur->getTelephone(),
                "EMAIL" => $redacteur->getEmail(),
                "ADRESSE" => $redacteur->getAdresse(),
                "CERTIFIE" => $redacteur->getCertification() ? 'OUI' : 'NON',
                "NOMBRE D'ARTICLES" => $facture['nbrArticles'],
                "NOMBRE DE MOTS" => $facture['nbrMots'],
                "DATE DE VALIDATION" => $facture['dateValidation']
            ];
        }

        print_r(json_encode($data)); exit;
    }

    public function getRedactionsCli($values) {

    }

}