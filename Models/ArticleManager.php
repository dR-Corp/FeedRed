<?php

use phpDocumentor\Reflection\Types\Self_;

use function PHPUnit\Framework\isNull;

/**
 * 
 * class ArticleManager
 * Access to the model and manage the database
 */

class ArticleManager {

    private $bdd;
    private $sql_details;

    public function __construct() {
        $this->bdd = MyAutoload::dbconnect();
        $this->sql_details = MyAutoload::sql_details();
    }

    public function findAll() {

        $bdd = $this->bdd;
        $articles = [];
        /*** Accès au model */
        $query = "SELECT * FROM article ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $article = new Article();
            $article->setIdArticle($row['idArticle']);
            $article->setTitre($row['titre']);
            $article->setDescription($row['description']);
            $article->setLiens($row['liens']);
            $article->setNbrMots($row['nbrMots']);
            $article->setEtat($row['etat']);
            $article->setDelai($row['delai']);
            $article->setRedacteur($row['redacteur']);
            $article->setDateLimit($row['date_limit_other']);
            $article->setCreatedAt($row['created_at']);
            $article->setUpdatedAt($row['updated_at']);
            $article->setUrgence($row['urgence']);
            $article->setIdClient($row['idClient']);

            $article->setTon($row['ton']);
            $article->setStyle($row['style']);
            $article->setType($row['type']);
            $article->setPlan($row['plan']);

            $articles[] = $article;

        };

        return $articles;
    }

    public function findUrgenceArticle($urgence) {

        $bdd = $this->bdd;
        $articles = [];
        /*** Accès au model */
        $query = "SELECT * FROM article WHERE urgence = '$urgence' ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $article = new Article();
            $article->setIdArticle($row['idArticle']);
            $article->setTitre($row['titre']);
            $article->setDescription($row['description']);
            $article->setLiens($row['liens']);
            $article->setNbrMots($row['nbrMots']);
            $article->setEtat($row['etat']);
            $article->setDelai($row['delai']);
            $article->setRedacteur($row['redacteur']);
            $article->setDateLimit($row['date_limit_other']);
            $article->setCreatedAt($row['created_at']);
            $article->setUpdatedAt($row['updated_at']);
            $article->setUrgence($row['urgence']);
            $article->setIdClient($row['idClient']);

            $article->setTon($row['ton']);
            $article->setStyle($row['style']);
            $article->setType($row['type']);
            $article->setPlan($row['plan']);

            $articles[] = $article;

        };

        return $articles;
    }

    public function findLimit() {

        $bdd = $this->bdd;
        $articles = [];
        /*** Accès au model */
        $query = "SELECT * FROM article WHERE etat IS NULL ORDER BY created_at DESC LIMIT 50";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $article = new Article();
            $article->setIdArticle($row['idArticle']);
            $article->setTitre($row['titre']);
            $article->setDescription($row['description']);
            $article->setLiens($row['liens']);
            $article->setNbrMots($row['nbrMots']);
            $article->setEtat($row['etat']);
            $article->setDelai($row['delai']);
            $article->setRedacteur($row['redacteur']);
            $article->setDateLimit($row['date_limit_other']);
            $article->setCreatedAt($row['created_at']);
            $article->setUpdatedAt($row['updated_at']);
            $article->setUrgence($row['urgence']);
            $article->setIdClient($row['idClient']);

            $article->setTon($row['ton']);
            $article->setStyle($row['style']);
            $article->setType($row['type']);
            $article->setPlan($row['plan']);

            $articles[] = $article;

        };

        return $articles;
    }

    public function findSetted() {

        $bdd = $this->bdd;
        $articles = [];
        /*** Accès au model */
        $query = "SELECT * FROM article WHERE etat=2";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $article = new Article();
            $article->setIdArticle($row['idArticle']);
            $article->setTitre($row['titre']);
            $article->setDescription($row['description']);
            $article->setLiens($row['liens']);
            $article->setNbrMots($row['nbrMots']);
            $article->setEtat($row['etat']);
            $article->setDelai($row['delai']);
            $article->setRedacteur($row['redacteur']);
            $article->setDateLimit($row['date_limit_other']);
            $article->setCreatedAt($row['created_at']);
            $article->setUpdatedAt($row['updated_at']);
            $article->setUrgence($row['urgence']);
            $article->setIdClient($row['idClient']);

            $article->setTon($row['ton']);
            $article->setStyle($row['style']);
            $article->setType($row['type']);
            $article->setPlan($row['plan']);

            $articles[] = $article;

        };

        return $articles;
    }

    public function list() {

        $bdd = $this->bdd;
        $articles = [];
        /*** Accès au model */
        $query = "SELECT * FROM article WHERE etat IS NULL ORDER BY created_at ASC";
        $query2 = "SELECT * FROM article WHERE etat=3 ORDER BY created_at ASC";
        $query3 = "SELECT * FROM article WHERE etat=4 ORDER BY created_at ASC";
        $req = $bdd->prepare($query);
        $req2 = $bdd->prepare($query2);
        $req3 = $bdd->prepare($query3);
        $req->execute();
        $req2->execute();
        $req3->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $article = new Article();
            $article->setIdArticle($row['idArticle']);
            $article->setTitre($row['titre']);
            $article->setDescription($row['description']);
            $article->setLiens($row['liens']);
            $article->setNbrMots($row['nbrMots']);
            $article->setEtat($row['etat']);
            $article->setDelai($row['delai']);
            $article->setRedacteur($row['redacteur']);
            $article->setDateLimit($row['date_limit_other']);
            $article->setCreatedAt($row['created_at']);
            $article->setUpdatedAt($row['updated_at']);
            $article->setUrgence($row['urgence']);
            $article->setIdClient($row['idClient']);

            $article->setTon($row['ton']);
            $article->setStyle($row['style']);
            $article->setType($row['type']);
            $article->setPlan($row['plan']);

            $articles[] = $article;
        };

        while($row = $req2->fetch(PDO::FETCH_ASSOC)) {
            $article = new Article();
            $article->setIdArticle($row['idArticle']);
            $article->setTitre($row['titre']);
            $article->setDescription($row['description']);
            $article->setLiens($row['liens']);
            $article->setNbrMots($row['nbrMots']);
            $article->setEtat($row['etat']);
            $article->setDelai($row['delai']);
            $article->setRedacteur($row['redacteur']);
            $article->setDateLimit($row['date_limit_other']);
            $article->setCreatedAt($row['created_at']);
            $article->setUpdatedAt($row['updated_at']);
            $article->setIdClient($row['idClient']);

            $article->setTon($row['ton']);
            $article->setStyle($row['style']);
            $article->setType($row['type']);
            $article->setPlan($row['plan']);

            $articles[] = $article;
        };

        while($row = $req3->fetch(PDO::FETCH_ASSOC)) {
            $article = new Article();
            $article->setIdArticle($row['idArticle']);
            $article->setTitre($row['titre']);
            $article->setDescription($row['description']);
            $article->setLiens($row['liens']);
            $article->setNbrMots($row['nbrMots']);
            $article->setEtat($row['etat']);
            $article->setDelai($row['delai']);
            $article->setRedacteur($row['redacteur']);
            $article->setDateLimit($row['date_limit_other']);
            $article->setCreatedAt($row['created_at']);
            $article->setUpdatedAt($row['updated_at']);
            $article->setIdClient($row['idClient']);

            $article->setTon($row['ton']);
            $article->setStyle($row['style']);
            $article->setType($row['type']);
            $article->setPlan($row['plan']);

            $articles[] = $article;
        };

        return $articles;
    }

    public function getLastArticle() {

        $bdd = $this->bdd;
        $articles = [];
        /*** Accès au model */
        $query = "SELECT * FROM article WHERE (etat IS NULL OR etat = 3 OR etat = 4) AND (urgence IS NULL OR urgence = 0) ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $article = new Article();
            $article->setIdArticle($row['idArticle']);
            $article->setTitre($row['titre']);
            $article->setDescription($row['description']);
            $article->setLiens($row['liens']);
            $article->setNbrMots($row['nbrMots']);
            $article->setEtat($row['etat']);
            $article->setDelai($row['delai']);
            $article->setRedacteur($row['redacteur']);
            $article->setDateLimit($row['date_limit_other']);
            $article->setCreatedAt($row['created_at']);
            $article->setUpdatedAt($row['updated_at']);
            $article->setUrgence($row['urgence']);
            $article->setIdClient($row['idClient']);

            $article->setTon($row['ton']);
            $article->setStyle($row['style']);
            $article->setType($row['type']);
            $article->setPlan($row['plan']);

            $articles[] = $article;
        };

        return end($articles);
        
    }

    public function getLastUrgenceArticle() {

        $bdd = $this->bdd;
        $articles = [];
        /*** Accès au model */
        $query = "SELECT * FROM article WHERE (etat IS NULL OR etat = 3  OR etat = 4) AND urgence = 1 ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $article = new Article();
            $article->setIdArticle($row['idArticle']);
            $article->setTitre($row['titre']);
            $article->setDescription($row['description']);
            $article->setLiens($row['liens']);
            $article->setNbrMots($row['nbrMots']);
            $article->setEtat($row['etat']);
            $article->setDelai($row['delai']);
            $article->setRedacteur($row['redacteur']);
            $article->setDateLimit($row['date_limit_other']);
            $article->setCreatedAt($row['created_at']);
            $article->setUpdatedAt($row['updated_at']);
            $article->setUrgence($row['urgence']);
            $article->setIdClient($row['idClient']);

            $article->setTon($row['ton']);
            $article->setStyle($row['style']);
            $article->setType($row['type']);
            $article->setPlan($row['plan']);

            $articles[] = $article;
        };

        return end($articles);
    }

    public function getResponse() {
        $bdd = $this->bdd;
        $articles = [];
        /*** Accès au model */
        $query = "SELECT * FROM article ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $date1 = new DateTime($row['created_at']);
            $date2 = new DateTime($row['updated_at']);
            $article = array(
                'idArticle' => $row['idArticle'],
                'titre' => $row['titre'],
                'description' => $row['description'],
                'liens' => $row['liens'],
                'nbrMots' => $row['nbrMots'],
                'etat' => $row['etat'],
                'delai' => $row['delai'],
                'redacteur' => $row['redacteur'],
                'date_limit_other' => $row['date_limit_other'],
                'created_at' => $date1->format('d/m/Y à H:i:s'),
                'updated_at' => $date2->format('d/m/Y à H:i:s'),
                'urgence' => $row['urgence'],
                'idClient' => $row['idClient'],

                'ton' => $row['ton'],
                'style' => $row['style'],
                'type' => $row['type'],
                'plan' => $row['plan'],
            );

            $articles[] = $article;

        };

        return $articles[0];
    }

    public function SSProcessing($filter = null, $where = null) {
        // DB table to use
        $table = 'article';

        // Table's primary key
        $primaryKey = 'idArticle';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'idArticle', 'dt' => 'idArticle' ),
            array( 'db' => 'titre', 'dt' => 'titre' ),
            array( 'db' => 'description', 'dt' => 'description' ),
            array( 'db' => 'liens', 'dt' => 'liens' ),
            array( 'db' => 'nbrMots', 'dt' => 'nbrMots' ),
            array( 'db' => 'etat', 'dt' => 'etat' ),
            array( 'db' => 'idClient', 'dt' => 'idClient' ),
            array(
                'db'        => 'redacteur',
                'dt'        => 'redacteur',
                'formatter' => function( $d, $row ) {
                    if(isset($d)) {
                        $red = (new RedacteurManager())->find($d);
                        $user = (new UsersManager())->find($red->getIdUser());
                        $nom = $user->getNom();
                        $prenom = $user->getPrenom();
                        return array($red->getIdUser(), $nom." ".$prenom);
                    }
                    return "";
                }
            ),
            array(
                'db'        => 'delai',
                'dt'        => 'delai_h',
                'formatter' => function( $d, $row ) {
                    return $d."H";
                }
            ),
            array( 'db' => 'delai', 'dt' => 'delai' ),
            array(
                'db'        => 'created_at',
                'dt'        => 'created_at',
                'formatter' => function( $d, $row ) {
                    $date1 = new DateTime($d);
                    return $date1->format('d/m/Y à H:i:s');
                }
            ),
            array(
                'db'        => 'updated_at',
                'dt'        => 'updated_at',
                'formatter' => function( $d, $row ) {
                    $date2 = new DateTime($d);
                    return $date2->format('d/m/Y à H:i:s');
                }
            ),
            array( 'db' => 'urgence', 'dt' => 'urgence' ),
            array( 'db' => 'idClient', 'dt' => 'idClient' ),

            array( 'db' => 'ton', 'dt' => 'ton' ),
            array( 'db' => 'style', 'dt' => 'style' ),
            array( 'db' => 'type', 'dt' => 'type' ),
            array( 'db' => 'plan', 'dt' => 'plan' )

        );
        
        $articles = SSP::complex( $_GET, $this->sql_details, $table, $primaryKey, $columns, $filter, $where );

        return $articles;
    }

    public function getAllResponse() {

        return self::SSProcessing(null, null);

    }

    public function getArticleUrgentResponse() {

        $where = "urgence = 1";

        return self::SSProcessing(null, $where);

    }


    public function getArticleLibresResponse() {

        $where = "etat IS NULL";

        return self::SSProcessing(null, $where);

    }

    public function getArticleUrgentLibresResponse() {

        $where = "etat IS NULL AND urgence = 1";

        return self::SSProcessing(null, $where);

    }

    public function getArticlePrisResponse() {

        $where = "etat = 2";

        return self::SSProcessing(null, $where);

    }

    public function getArticleLaissesResponse() {

        $where = "etat = 3";

        return self::SSProcessing(null, $where);

    }

    public function getArticleLiberesResponse() {

        $where = "etat = 4";

        return self::SSProcessing(null, $where);

    }

    public function getArticleRedigesResponse() {

        $where = "etat = 1";

        return self::SSProcessing(null, $where);

    }
    
    public function getResponseLimit() {

        $where = "etat IS NULL";

        return self::SSProcessing(null, $where);

    }

    public function getResponse_up($id) {
        $bdd = $this->bdd;
        $articles = [];
        /*** Accès au model */
        $table = ($_SESSION['profil'] != 4) ? 'article' : 'article';
        $query = "SELECT * FROM $table WHERE idArticle='$id' ORDER BY created_at DESC";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $date1 = new DateTime($row['created_at']);
            $date2 = new DateTime($row['updated_at']);
            $article = array(
                'idArticle' => $row['idArticle'],
                'titre' => $row['titre'],
                'description' => $row['description'],
                'liens' => $row['liens'],
                'nbrMots' => $row['nbrMots'],
                'etat' => $row['etat'],
                'delai' => $row['delai'],
                'redacteur' => $row['redacteur'],
                'date_limit_other' => $row['date_limit_other'],
                'created_at' => $date1->format('d/m/Y à H:i:s'),
                'updated_at' => $date2->format('d/m/Y à H:i:s'),
                'urgence' => $row['urgence'],
                'idClient' => $row['idClient'],

                'ton' => $row['ton'],
                'style' => $row['style'],
                'type' => $row['type'],
                'plan' => $row['plan'],
            );
            $articles[] = $article;
        };

        return $articles[0];
    }

    public function find($idArticle) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM article WHERE idArticle= :idArticle";
        $req = $bdd->prepare($query);
        $req->bindValue(':idArticle', $idArticle, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $article = new Article();
        $article->setIdArticle($row['idArticle']);
        $article->setTitre($row['titre']);
        $article->setDescription($row['description']);
        $article->setLiens($row['liens']);
        $article->setNbrMots($row['nbrMots']);
        $article->setEtat($row['etat']);
        $article->setDelai($row['delai']);
        $article->setRedacteur($row['redacteur']);
        $article->setDateLimit($row['date_limit_other']);
        $article->setCreatedAt($row['created_at']);
        $article->setUpdatedAt($row['updated_at']);
        $article->setUrgence($row['urgence']);
        $article->setIdClient($row['idClient']);

        $article->setTon($row['ton']);
        $article->setStyle($row['style']);
        $article->setType($row['type']);
        $article->setPlan($row['plan']);

        return $article;

    }

    public function findCli($idArticle) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM article_client WHERE idArticle= :idArticle";
        $req = $bdd->prepare($query);
        $req->bindValue(':idArticle', $idArticle, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        $article = new Article();
        $article->setIdArticle($row['idArticle']);
        $article->setTitre($row['titre']);
        $article->setDescription($row['description']);
        $article->setLiens($row['liens']);
        $article->setNbrMots($row['nbrMots']);
        $article->setEtat($row['etat']);
        $article->setDelai($row['delai']);
        $article->setRedacteur($row['redacteur']);
        $article->setDateLimit($row['date_limit_other']);
        $article->setCreatedAt($row['created_at']);
        $article->setUpdatedAt($row['updated_at']);
        $article->setUrgence($row['urgence']);
        $article->setIdClient($row['idClient']);

        $article->setTon($row['ton']);
        $article->setStyle($row['style']);
        $article->setType($row['type']);
        $article->setPlan($row['plan']);

        return $article;

    }

    public function save($values) {

        $bdd = $this->bdd;

        $table = 'article';

        if(isset($values['idArticle'])) {
            $query = "UPDATE $table SET titre = :titre, description = :description, nbrMots = :nbrMots, delai= :delai, urgence = :urgence, liens = :liens WHERE idArticle = :idArticle";
        }
        else {
            $query = "INSERT INTO $table (idArticle, titre, description, nbrMots, etat, delai, urgence, liens, idClient, ton, style, type, plan, redacteur) VALUES (NULL, :titre, :description, :nbrMots, :etat, :delai, :urgence, :liens, :idClient, :ton, :style, :type, :plan, :redacteur)";
        }
        $req = $bdd->prepare($query);

        // processing values
        $urgence = $values['urgence'] == "true" ? 1 : 0;
        $ton = isset($values['ton']) ? $values['ton'] : "";
        $type = isset($values['type']) ? $values['type'] : "";
        $style = isset($values['style']) ? $values['style'] : "";
        $plan = isset($values['plan']) ? $values['plan'] : "";
        $titre = isset($values['titre']) ? $values['titre'] : "";
        $description = isset($values['description']) ? $values['description'] : "";
        $liens = isset($values['liens']) ? $values['liens'] : "";
        $nbrMots = isset($values['nbrMots']) ? $values['nbrMots'] : "";
        $delai = isset($values['delai']) ? $values['delai'] : 0;
        $idClient = isset($values['idClient']) ? $values['idClient'] : "";
        $etat = (isset($values['idClient']) && $_SESSION['profil'] == 4) ? 6 : NULL; 
        // ETAT = 6 signifie obtimisation en cours, tout comme au niveau de la rédaction
        $redacteur = (isset($values['idClient']) && $_SESSION['profil'] == 4) ? 0 : NULL;

        // binding values
        
        if(isset($values['idArticle'])) $req->bindValue(':idArticle', $values['idArticle'], PDO::PARAM_INT);
        
        $req->bindValue(':redacteur', $redacteur, PDO::PARAM_INT);
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':liens', $liens, PDO::PARAM_STR);
        $req->bindValue(':nbrMots', $nbrMots, PDO::PARAM_INT);
        $req->bindValue(':delai', $delai, PDO::PARAM_INT);
        $req->bindValue(':idClient', $idClient, PDO::PARAM_INT);
        $req->bindValue(':etat', $etat, PDO::PARAM_INT);
        $req->bindValue(':urgence', $urgence , PDO::PARAM_INT);
        $req->bindValue(':ton', $ton, PDO::PARAM_STR);
        $req->bindValue(':type', $type, PDO::PARAM_STR);
        $req->bindValue(':style', $style, PDO::PARAM_STR);
        $req->bindValue(':plan', $plan, PDO::PARAM_STR);

        // print_r($req);
        
        $req->execute();

        return $bdd->lastInsertId();

    }

    public function delete($idArticle) {

        $bdd = $this->bdd;

        $table = ($_SESSION['profil'] != 4) ? 'article' : 'article_client';

        $query = "DELETE FROM $table WHERE idArticle= :idArticle";
        $req = $bdd->prepare($query);
        $req->bindValue(':idArticle', $idArticle, PDO::PARAM_INT);
        $req->execute();

    }

    public function settedArticle($values) {
        
        $bdd = $this->bdd;

        $manager = new ArticleManager();
        $article = $manager->find($values['idArticle']);

        $duree = $article->getDelai();
        $limit = "this day".$duree."hour";
        setlocale(LC_TIME, "fr_FR.utf8", 'fra');
        $date_limit = date('Y-m-d H:i:s', strtotime($limit));
        $heure_limit = date('H', strtotime($limit));
        $minute_limit = date('i', strtotime($limit));
        $seconde = date('s', strtotime($limit));
        $jour_limit = date('d', strtotime($limit));
        $mois_limit = date('m', strtotime($limit));
        $annee_limit = date('Y', strtotime($limit));
        $date_limit_other = mktime($heure_limit, $minute_limit, $seconde, $mois_limit, $jour_limit, $annee_limit);

        //Indiquer que l'article est en cours de rédaction et indiquer aussi la fin du délai de rédaction de l'article
        $query = "UPDATE article SET etat = :etat, redacteur= :redacteur, date_limit_other= :date_limit_other WHERE idArticle = :idArticle";
        $req = $bdd->prepare($query);

        $req->bindValue(':idArticle', $values['idArticle'], PDO::PARAM_INT);
        $req->bindValue(':etat', 2, PDO::PARAM_INT);
        $req->bindValue(':date_limit_other', $date_limit_other, PDO::PARAM_INT);
        $req->bindValue(':redacteur', $values['idRedacteur'], PDO::PARAM_INT);
        $req->execute();
        //Indiquer au niveau du redacteur qui est entrain de le rediger l'idArticle de l'article
        $query = "UPDATE redacteur SET article = :article WHERE idRedacteur = :idRedacteur";
        $req = $bdd->prepare($query);

        $req->bindValue(':idRedacteur', $values['idRedacteur'], PDO::PARAM_INT);
        $req->bindValue(':article', $values['idArticle'], PDO::PARAM_INT);
        $req->execute();

    }

    public function writtedArticle($values) {

        $bdd = $this->bdd;
        //Indiquer que l'article est en cours de rédaction
        $query = "UPDATE article SET etat = :etat WHERE idArticle = :idArticle";
        $req = $bdd->prepare($query);

        $req->bindValue(':idArticle', $values['idArticle'], PDO::PARAM_INT);
        $req->bindValue(':etat', 1, PDO::PARAM_INT);
        $req->execute();
        //Indiquer au niveau du redacteur qui est entrain de le rediger l'idArticle de l'article
        $query = "UPDATE redacteur SET article = :article WHERE idRedacteur = :idRedacteur";
        $req = $bdd->prepare($query);

        $req->bindValue(':article', NULL, PDO::PARAM_INT);
        $req->bindValue(':idRedacteur', $values['idRedacteur'], PDO::PARAM_INT);
        $req->execute();

    }

    public function releaseArticle($values) {
        
        $bdd = $this->bdd;
        //Indiquer que l'article est en cours de rédaction
        $query = "UPDATE article SET etat = :etat, redacteur= :redacteur, date_limit_other= :date_limit_other WHERE idArticle = :idArticle";
        $req = $bdd->prepare($query);

        $req->bindValue(':idArticle', $values['idArticle'], PDO::PARAM_INT);
        $req->bindValue(':etat', 3, PDO::PARAM_INT);
        $req->bindValue(':redacteur', $values['idRedacteur'], PDO::PARAM_INT);
        $req->bindValue(':date_limit_other', "", PDO::PARAM_INT);
        $req->execute();
        //Indiquer au niveau du redacteur qui est entrain de le rediger l'idArticle de l'article
        $query = "UPDATE redacteur SET article = :article WHERE idRedacteur = :idRedacteur";
        $req = $bdd->prepare($query);

        $req->bindValue(':article', NULL, PDO::PARAM_INT);
        $req->bindValue(':idRedacteur', $values['idRedacteur'], PDO::PARAM_INT);
        $req->execute();

    }

    public function freeArticle($values) {
        
        $bdd = $this->bdd;
        //Indiquer que l'article est en cours de rédaction
        $query = "UPDATE article SET etat = :etat, redacteur= :redacteur, date_limit_other= :date_limit_other WHERE idArticle = :idArticle";
        $req = $bdd->prepare($query);

        $req->bindValue(':idArticle', $values['idArticle'], PDO::PARAM_INT);
        $req->bindValue(':etat', 4, PDO::PARAM_INT);
        $req->bindValue(':redacteur', $values['idRedacteur'], PDO::PARAM_INT);
        $req->bindValue(':date_limit_other', "", PDO::PARAM_INT);
        $req->execute();
        //Indiquer au niveau du redacteur qui est entrain de le rediger l'idArticle de l'article
        $query = "UPDATE redacteur SET article = :article WHERE idRedacteur = :idRedacteur";
        $req = $bdd->prepare($query);

        $req->bindValue(':idRedacteur', $values['idRedacteur'], PDO::PARAM_INT);
        $req->bindValue(':article', NULL, PDO::PARAM_INT);
        $req->execute();

    }

    public function getNbrArticle() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM article");
		return $select->rowCount();
    }
    public function getNbrArticleCli($id) {
        $bdd = $this->bdd; $select = $bdd->query("SELECT * FROM article WHERE idClient = '$id' "); return $select->rowCount();
    }
    public function getNbrArticleCliLibres($id) {
        $bdd = $this->bdd; $select = $bdd->query("SELECT * FROM article WHERE idClient = '$id' AND etat IS NULL OR etat = 2 OR etat = 3 OR etat = 4"); return $select->rowCount();
    }
    public function getNbrArticleCliPris($id) {
        $bdd = $this->bdd; $select = $bdd->query("SELECT * FROM article WHERE idClient = '$id' AND etat = 2"); return $select->rowCount();
    }
    public function getNbrArticleCliRediges($id) {
        $bdd = $this->bdd; $select = $bdd->query("SELECT * FROM article WHERE idClient = '$id' AND etat = 1"); return $select->rowCount();
    }
    public function getNbrArticleCliLiberes($id) {
        $bdd = $this->bdd; $select = $bdd->query("SELECT * FROM article WHERE idClient = '$id' AND etat = 4"); return $select->rowCount();
    }
    public function getNbrArticleCliLaisses($id) {
        $bdd = $this->bdd; $select = $bdd->query("SELECT * FROM article WHERE idClient = '$id' AND etat = 3"); return $select->rowCount();
    }

    public function getNbrArticleLibre() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM article WHERE etat IS NULL");
		return $select->rowCount();
    }
    public function getNbrArticlePris() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM article WHERE etat=2");
		return $select->rowCount();
    }
    public function getNbrArticleLaisses() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM article WHERE etat=3");
		return $select->rowCount();
    }
    public function getNbrArticleLiberes() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM article WHERE etat=4");
		return $select->rowCount();
    }
    public function getNbrArticleRediges() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM article WHERE etat=1");
		return $select->rowCount();
    }
    public function getNbrArticleUrgentLibre() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM article WHERE etat IS NULL AND urgence = 1");
		return $select->rowCount();
    }
    public function getNbrArticleUrgent() {
        $bdd = $this->bdd;
		$select = $bdd->query("SELECT * FROM article WHERE urgence = 1");
		return $select->rowCount();
    }

    public function getNbCliUrgArticle($id) {
        $bdd = $this->bdd;
        $query = "SELECT * FROM article WHERE (urgence IS NOT NULL OR urgence = 1) ORDER BY created_at DESC";
        $select = $bdd->query($query);
        return $select->rowCount();
    }

    public function getCliNbArticle($id) {
        $bdd = $this->bdd;
        $query = "SELECT * FROM article WHERE idClient = '$id' ORDER BY created_at DESC";
        $select = $bdd->query($query);
        return $select->rowCount();
    }

    public function getCliNbCommandes($id) {
        $bdd = $this->bdd;
        $query = "SELECT * FROM article WHERE idClient = '$id'";
        $select = $bdd->query($query);
        return $select->rowCount();
    }

    public function getNbCommandes() {
        $bdd = $this->bdd;
        $query = "SELECT * FROM article WHERE idClient != 0";
        $select = $bdd->query($query);
        return $select->rowCount();
    }

    public function getCliLastArticles($id) {

        $bdd = $this->bdd;
        $articles = [];
        /*** Accès au model */
        $query = "SELECT * FROM article WHERE idClient = '$id' ORDER BY created_at DESC LIMIT 5";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $article = new Article();
            $article->setIdArticle($row['idArticle']);
            $article->setTitre($row['titre']);
            $article->setDescription($row['description']);
            $article->setLiens($row['liens']);
            $article->setNbrMots($row['nbrMots']);
            $article->setEtat($row['etat']);
            $article->setDelai($row['delai']);
            $article->setRedacteur($row['redacteur']);
            $article->setDateLimit($row['date_limit_other']);
            $article->setCreatedAt($row['created_at']);
            $article->setUpdatedAt($row['updated_at']);
            $article->setUrgence($row['urgence']);
            $article->setIdClient($row['idClient']);
    
            $article->setTon($row['ton']);
            $article->setStyle($row['style']);
            $article->setType($row['type']);
            $article->setPlan($row['plan']);

            $articles[] = $article;

        };

        return $articles;
    }

    public function SSProcessingCLI($filter = null, $where = null) {
        // DB table to use
        $table = 'article_client';

        // Table's primary key
        $primaryKey = 'idArticle';

        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'idArticle', 'dt' => 'idArticle' ),
            array( 'db' => 'titre', 'dt' => 'titre' ),
            array( 'db' => 'description', 'dt' => 'description' ),
            array( 'db' => 'liens', 'dt' => 'liens' ),
            array( 'db' => 'nbrMots', 'dt' => 'nbrMots' ),
            array( 'db' => 'etat', 'dt' => 'etat' ),
            array( 'db' => 'idClient', 'dt' => 'idClient' ),
            array(
                'db'        => 'idClient',
                'dt'        => 'client',
                'formatter' => function( $d, $row ) {
                    if(isset($d)) {
                        $cli = (new ClientManager())->find($d);
                        $user = (new UsersManager())->find($cli->getIdUser());
                        $nom = $user->getNom();
                        $prenom = $user->getPrenom();
                        return array($cli->getIdUser(), $nom." ".$prenom);
                    }
                    return "";
                }
            ),
            array(
                'db'        => 'delai',
                'dt'        => 'delai_h',
                'formatter' => function( $d, $row ) {
                    return $d."H";
                }
            ),
            array( 'db' => 'delai', 'dt' => 'delai' ),
            array(
                'db'        => 'created_at',
                'dt'        => 'created_at',
                'formatter' => function( $d, $row ) {
                    $date1 = new DateTime($d);
                    return $date1->format('d/m/Y à H:i:s');
                }
            ),
            array(
                'db'        => 'updated_at',
                'dt'        => 'updated_at',
                'formatter' => function( $d, $row ) {
                    $date2 = new DateTime($d);
                    return $date2->format('d/m/Y à H:i:s');
                }
            ),
            array( 'db' => 'urgence', 'dt' => 'urgence' ),
            array( 'db' => 'idClient', 'dt' => 'idClient' ),

            array( 'db' => 'ton', 'dt' => 'ton' ),
            array( 'db' => 'style', 'dt' => 'style' ),
            array( 'db' => 'type', 'dt' => 'type' ),
            array( 'db' => 'plan', 'dt' => 'plan' )

        );

        $articles = SSP::complex( $_GET, $this->sql_details, $table, $primaryKey, $columns, $filter, $where );

        return $articles;
    }

    public function getCliArticles($id) {
        $where = "idClient = '$id'";
        return self::SSProcessing(null, $where);
    }
    public function getCliArticlesLibres($id) {
        $where = "idClient = '$id' AND (etat IS NULL OR etat = 2 OR etat = 3 OR etat = 4)";
        return self::SSProcessing(null, $where);
    }
    public function getCliArticlesRediges($id) {
        $where = "idClient = '$id' AND etat = 1";
        return self::SSProcessing(null, $where);
    }
    public function getCliArticlesPris($id) {
        $where = "idClient = '$id' AND etat = 2";
        return self::SSProcessing(null, $where);
    }
    public function getCliArticlesLaisses($id) {
        $where = "idClient = '$id' AND etat = 3";
        return self::SSProcessing(null, $where);
    }
    public function getCliArticlesLiberes($id) {
        $where = "idClient = '$id' AND etat = 4";
        return self::SSProcessing(null, $where);
    }

    public function getAllCommandes() {
        $where = "idClient != 0";
        return self::SSProcessing(null, $where);
    }
    public function getCliCommandes($id) {
        $where = "idClient = '$id'";
        return self::SSProcessingCLI(null, $where);
    }

    public function getCliCommandesArticles($id) {
        $where = "idClient = '$id'";
        return self::SSProcessing(null, $where);
    }

    public function getCliRedRunArticles($id) {
        $where = "idClient = '$id' AND etat = 2";
        return self::SSProcessingCLI(null, $where);
    }
    public function getCliRedArticles($id) {
        $where = "idClient = '$id' AND etat = 1";
        return self::SSProcessingCLI(null, $where);
    }

    public function accepterCommande($params) {
        
        $bdd = $this->bdd;
        extract($params);

        if(!$etat) { 
            //on accepte la commande
            $copie = "INSERT INTO article (titre, description, nbrMots, etat, delai, redacteur, created_at, updated_at, date_limit_other, urgence, liens, idClient, orderID)
                        SELECT titre, description, nbrMots, etat, delai, redacteur, created_at, updated_at, date_limit_other, urgence, liens, idClient, idArticle 
                        FROM article_client WHERE article_client.idArticle = '$idArticle' "; 
            $validation = "UPDATE article_client SET etat = 1 WHERE idArticle = '$idArticle' ";
            $bdd->exec($copie);
            $bdd->exec($validation);
        }
        else {
            //on retire la commande
            $select = "SELECT * FROM article WHERE idClient = '$client' AND orderID = '$idArticle' ";
            $res = $bdd->query($select)->fetch();
            if($res['etat'] == 0 || isNull($res['etat'])) {
                $retrait = "DELETE FROM article WHERE idClient = '$client' AND orderID = '$idArticle' "; 
                $refus = "UPDATE article_client SET etat = NULL WHERE idArticle = '$idArticle' ";
                $bdd->exec($retrait);
                $bdd->exec($refus);
            }
            else {
                return [
                    "alert" => "error",
                    "alert_message" => "Article déjà en cours de rédaction",
                ];
            }

            
        }

        return $params;

    }

    public function getCliArticleRed($id) {
        $bdd = $this->bdd;
        $query = "SELECT * FROM article WHERE idClient = '$id' AND etat = 1 ORDER BY created_at DESC";
        $select = $bdd->query($query);
        return $select->rowCount();
    }

    public function getClieRecRun($id) {
        $bdd = $this->bdd;
        $query = "SELECT * FROM article WHERE idClient = '$id' AND etat = 2 ORDER BY created_at DESC";
        $select = $bdd->query($query);
        return $select->rowCount();
    }

    public function getNbrMots($id) {
        $bdd = $this->bdd;
        $req = "SELECT sum(nbrMots) as nbrMots FROM article WHERE idClient = '$id' AND etat = 1 ORDER BY created_at DESC";
        $nb = $bdd->query($req)->fetch(PDO::FETCH_ASSOC)['nbrMots'];
        return $nb ? $nb : 0 ;
    }

}