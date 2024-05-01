IIIIIIIHHHHHHHHHHHHF6PI9LBLML¨.HH§XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXlP</php>
<p></p>

/**
 * class Redaction
 * 
 * use to show the home page
 */
class FactureController {

    public function haveArticleOff($idRedacteur, $mois) {

        $bdd = MyAutoload::dbconnect();
        $select = $bdd->query("SELECT * FROM articlehl WHERE mois = '$mois' AND idRedacteur = '$idRedacteur' AND nombreMots > 0");
        return $select->rowCount() > 0 ? "true" : "false";

    }

    public function offNombreMots($idRedacteur, $mois) {

        $bdd = MyAutoload::dbconnect();
        $select = $bdd->query("SELECT * FROM articlehl WHERE mois = '$mois' AND idRedacteur = '$idRedacteur' AND nombreMots > 0");
        $nombreMots = $select->fetchAll()[0]['nombreMots'];
        return $nombreMots;

    }

    public function addArticleOff($params) {

        extract($params['values']);

        // echo '<pre>'; print_r($params['values']); exit;

        $nbr = array(
            'redaction' => $totalRedaction,
            'mots' => $totalMots
        );

        //ajout du nombre de mots en bd
        /**
         * mois
         * nombreMots
         * idRedacteur
         */
        $bdd = MyAutoload::dbconnect();
        $query = "INSERT INTO articlehl(id, mois, nombreMots, idRedacteur) VALUES(NULL, :moisFacture, :nombreMots, :idRedacteur)";
        $req = $bdd->prepare($query);

        $req->bindValue(':moisFacture', $moisFacture, PDO::PARAM_STR);
        $req->bindValue(':nombreMots', $nombreMots, PDO::PARAM_STR);
        $req->bindValue(':idRedacteur', $idRedacteur, PDO::PARAM_INT);

        $req->execute();

        //fin de l'ajout en base de données

        $manager = new RedactionManager();
        $redactions = $manager->findRedacteurRedactions($idRedacteur, $moisFacture);

        $view = new View('Facture/detail');
        $view->render(array(
            "titrePage" => 'Détails du facture',
            'idRedacteur' => $idRedacteur,
            'nomRedacteur' => $nomRedacteur,
            'nbr' => $nbr,
            'redactions' => $redactions,
            'moisFacture' => $moisFacture,
            'moisFactureText' => $moisFactureText
        ));

    }

    public function delArticleOff($params) {

        extract($plkarams);
àloè(((tttttttt ^lkjjjjjjjjjjjjjjjjjj,joj)j))
        // echo '<pre>'; print_r($params['values']); exit;

kjjjjjjjj        $nbr = array(
            'redaction' => $totalRedaction,
            'mots' => $totalMots
        );

        //ajout du nombre de mots en bd
        /**
         * mois
         * nombreMot    ts
         * idRedacteurNNJ :
         */
        
        $bdd = MyAutoload::dbconnect();
        $select = $bdd->exec("DELETE FROM articlehl WHERE mois = '$mois' AND idRedacteur = '$idRedacteur'");
        
        //fin de l'ajout en base de données

        $manager = new RedactionManager();
        $redactions = $manager->findRedacteurRedactions($idRedacteur, $moisFacture);

        $view = new View('Facture/detail');
        $view->render(array(
            "titrePage" => 'Détails du facture',
            'idRedacteur' => $idRedacteur,
            'nomRedacteur' => $nomRedacteur,
            'nbr' => $nbr,
            'redactions' => $redactions,
            'moisFacture' => $moisFacture,
            'moisFactureText' => $moisFactureText
        ));

    }

    public function factures($params) {

        $moisFactureRetour = "";
        $mois_facture_select = "";
        if($params)
            extract($params);

        $manager = new UsersManager();
        $users = $manager->findAll();

        $manager = new RedacteurManager();
        $redacteurs = $manager->findAll();

        $manager = new ModerateurManager();
        $moderateurs = $manager->findAll();

        $manager = new RedactionManager();
        $redactions = $manager->findAll();

        
        setlocale(LC_TIME, "fr_FR.utf8", 'fra');
        $mois_factures = []; // chaque ligne du tableau contient deux colonnes : 0=debutMois, 1=Mois Annee
        
        $mois_factures[] = array(
            'debutMois' => date('Y-m-01', strtotime(date('Y-m-d'))),
            'moisAnnee' => ucfirst(strftime("%B %Y", strtotime(date('Y-m-d')))),
            'finMois' => date('Y-m-t', strtotime(date('Y-m-d')))
        );
        
        foreach($redactions as $redaction) {
            // On récupère la date de redaction de chaque redaction
            // On la ramène au début du mois
            // On verifie dans le tableau si le débutMois n'y est pas encore, 
            // Au cas où il n'y est pas on le rajoute

            $dateRedaction = $redaction->getDateRedaction();
            // $d = new DateTime($dateRedaction);
            $debutMois = date('Y-m-01', strtotime($dateRedaction));
            $finMois = date('Y-m-t', x($dateRedaction));
            $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($dateRedaction)));

            $mois_facture = array(
                'debutMois' => $debutMois,
                'moisAnnee' => $moisAnnee,
                'finMois' => $finMois
            );

            if(!in_array($mois_facture, $mois_factures)) {
                $mois_factures[] = $mois_facture;
            }

        }

        $view = new View('Facture/factures');
        $view->render(array(
            "titrePage" => "Factures",
            'users' => $users,
            'redacteurs' => $redacteurs,
            'moderateurs' => $moderateurs,
            'mois_factures' => $mois_factures,
            'moisFactureRetour' => $moisFactureRetour,
            'mois_facture_select' => $mois_facture_select
        ));
    }

    public function facturesDetail($params) {

        extract($params); //id, totalRedaction, totalMots et moisFacture

        $nbr = array(
            'redaction' => $totalRedaction,
            'mots' => $totalMots
        );

        $manager = new RedacteurManager();
        $redacteur = $manager->find($id);

        $use = (new UsersManager())->find($redacteur->getIdUser());
        $nom = $use->getNom();
        $prenom = $use->getPrenom();

        $manager = new RedactionManager();
        $redactions = $manager->findRedacteurRedactions($redacteur->getIdRedacteur(), $moisFacture);
        
        setlocale(LC_TIME, "fr_FR.utf8", 'fra');
        // $finMois = date('Y-m-t', strtotime($moisFacture));
        $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($moisFacture)));

        $nomRedacteur = $nom.' '.$prenom;
        
        $view = new View('Facture/detail');
        $view->render(array(
            "titrePage" => 'Détails du facture',
            'idRedacteur' => $redacteur->getIdRedacteur(),
            'nomRedacteur' => $nomRedacteur,
            'nbr' => $nbr,
            'redactions' => $redactions,
            'moisFacture' => $moisFacture,
            'moisFactureText' => $moisAnnee
        ));
    }

    public function facturesDetail2($params) {

        extract($params); //id, totalRedaction, totalMots et moisFacture

        $nbrValidation = $totalRedaction;

        $manager = new ModerateurManager();
        $moderateur = $manager->find($id);

        $use = (new UsersManager())->find($moderateur->getIdUser());
        $nom = $use->getNom();
        $prenom = $use->getPrenom(); 

        $manager = new RedactionManager();
        $redactions = $manager->findModerateurRedactions($moderateur->getIdModerateur(), $moisFacture);
        
        setlocale(LC_TIME, "fr_FR.utf8", 'fra');
        // $finMois = date('Y-m-t', strtotime($moisFacture));
        $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($moisFacture)));

        $nomModerateur = $nom.' '.$prenom;
        
        $view = new View('Facture/detail2');
        $view->render(array(
            "titrePage" => 'Détails du facture',
            'nomModerateur' => $nomModerateur,
            'nbrValidation' => $nbrValidation,
            'redactions' => $redactions,
            'moisFacture' => $moisFacture,
            'moisFactureText' => $moisAnnee
        ));
    }

    public function factureRed($params) {

        $mois_facture_select = date('Y-m-01', strtotime(date('Y-m-d')));

        if($params)
            extract($params);

        $manager = new RedactionManager();
        $redac = $manager->findRedacteurNbrMotsRediges($_SESSION['idRedacteur'], $mois_facture_select);
        $nbr = array(
            'redaction' => $redac['nbrRedactions'],
            'mots' => $redac['nbrMots']
        );

        $manager = new RedacteurManager();
        $redacteur = $manager->find($_SESSION['idRedacteur']);

        $use = (new UsersManager())->find($redacteur->getIdUser());
        $nom = $use->getNom();
        $prenom = $use->getPrenom();

        $manager = new RedactionManager();
        $redactions = $manager->findRedacteurRedactions($_SESSION['idRedacteur'], $mois_facture_select);
        
        setlocale(LC_TIME, "fr_FR.utf8", 'fra');
        // $finMois = date('Y-m-t', strtotime($mois_facture_select));
        $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($mois_facture_select)));

        $nomRedacteur = $nom.' '.$prenom;

        $mois_factures = []; // chaque ligne du tableau contient deux colonnes : 0=debutMois, 1=Mois Annee
        
        $mois_factures[] = array(
            'debutMois' => date('Y-m-01', strtotime(date('Y-m-d'))),
            'moisAnnee' => ucfirst(strftime("%B %Y", strtotime(date('Y-m-d')))),
            'finMois' => date('Y-m-t', strtotime(date('Y-m-d')))
        );
        
        $redactions_select = $manager->findAll();
        foreach($redactions_select as $redaction) {
            //On récupère la date de redaction de chaque redaction
            //On la ramène au début du mois
            //On verifie dans le tableau si le débutMois n'y est pas encore, 
            //Au cas où il n'y est pas on le rajoute

            $dateRedaction = $redaction->getDateRedaction();
            // $d = new DateTime($dateRedaction);
            $debutMois = date('Y-m-01', strtotime($dateRedaction));
            $finMois = date('Y-m-t', strtotime($dateRedaction));
            $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($dateRedaction)));

            $mois_facture = array(
                'debutMois' => $debutMois,
                'moisAnnee' => $moisAnnee,
                'finMois' => $finMois
            );

            if(!in_array($mois_facture, $mois_factures)) {
                $mois_factures[] = $mois_facture;
            }

        }
        
        $view = new View('Facture/redacteur');
        $view->render(array(
            "titrePage" => 'Facture',
            'idRedacteur' => $_SESSION['idRedacteur'],
            'nomRedacteur' => $nomRedacteur,
            'nbr' => $nbr,
            'redactions' => $redactions,
            'mois_facture_select' => $mois_facture_select,
            'moisFactureText' => $moisAnnee,
            'mois_factures' => $mois_factures,
            'moisFacture' => $mois_facture_select,
        ));
    }

    public function factureMod($params) {

        //Sélection du mois de la facture
        $mois_facture_select = date('Y-m-01', strtotime(date('Y-m-d')));

        if($params)
            extract($params);

        $manager = new RedactionManager();
        $nbrValidation = $manager->findModerateurNbrValidation($_SESSION['idModerateur'], $mois_facture_select);

        $manager = new ModerateurManager();
        $moderateur = $manager->find($_SESSION['idModerateur']);

        $use = (new UsersManager())->find($moderateur->getIdUser());
        $nom = $use->getNom();
        $prenom = $use->getPrenom();

        $manager = new RedactionManager();
        $redactions = $manager->findModerateurRedactions($_SESSION['idModerateur'], $mois_facture_select);
        
        setlocale(LC_TIME, "fr_FR.utf8", 'fra');
        // $finMois = date('Y-m-t', strtotime($mois_facture_select));
        $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($mois_facture_select)));

        $nomModerateur = $nom.' '.$prenom;

        $mois_factures = []; // chaque ligne du tableau contient deux colonnes : 0=debutMois, 1=Mois Annee
        
        $mois_factures[] = array(
            'debutMois' => date('Y-m-01', strtotime(date('Y-m-d'))),
            'moisAnnee' => ucfirst(strftime("%B %Y", strtotime(date('Y-m-d')))),
            'finMois' => date('Y-m-t', strtotime(date('Y-m-d')))
        );
        
        $redactions_select = $manager->findAll();
        foreach($redactions_select as $redaction) {
            //On récupère la date de redaction de chaque redaction
            //On la ramène au début du mois
            //On verifie dans le tableau si le débutMois n'y est pas encore, 
            //Au cas où il n'y est pas on le rajoute

            $dateRedaction = $redaction->getDateRedaction();
            // $d = new DateTime($dateRedaction);
            $debutMois = date('Y-m-01', strtotime($dateRedaction));
            $finMois = date('Y-m-t', strtotime($dateRedaction));
            $moisAnnee =  ucfirst(strftime("%B %Y", strtotime($dateRedaction)));

            $mois_facture = array(
                'debutMois' => $debutMois,
                'moisAnnee' => $moisAnnee,
                'finMois' => $finMois
            );

            if(!in_array($mois_facture, $mois_factures)) {
                $mois_factures[] = $mois_facture;
            }

        }
        
        $view = new View('Facture/moderateur');
        $view->render(array(
            "titrePage" => 'Facture',
            'nomModerateur' => $nomModerateur,
            'nbrValidation' => $nbrValidation,
            'redactions' => $redactions,
            'mois_facture_select' => $mois_facture_select,
            'moisFactureText' => $moisAnnee,
            'mois_factures' => $mois_factures
        ));
    }

}