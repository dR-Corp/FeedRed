<?php

/**
 * class Home
 * 
 * use to show the home page
 */
class HomeController {

    public function showHome($params) {

        $manager = new ArticleManager();
        $article = $manager->getLastArticle();
        $nbrArticle = $manager->getNbrArticle();

        $manager = new UsersManager();
        $nbrUsers = $manager->getNbrUsers();

        $manager = new ModerateurManager();
        $nbrModerateur = $manager->getNbrModerateur();

        $manager = new RedacteurManager();
        $nbrRedacteur = $manager->getNbrRedacteur();

        $manager = new RedactionManager();

        $urgenceArticle = (new ArticleManager())->getLastUrgenceArticle();
        
        if($_SESSION['profil'] == 3):
            $id = $_SESSION['idRedacteur'];
            $nbrRedactions = $manager->getNbrRedaction($id);
            $nbrRedactionsS = $manager->getNbrRedactionS($id);
            $nbrRedactionsV = $manager->getNbrRedactionV($id);
            $nbrRedactionsN = $manager->getNbrRedactionN($id);
            //$nbrMots = $manager->getNbrMots($id);
        elseif($_SESSION['profil'] == 2):
            $id = $_SESSION['idModerateur'];
            $nbrRedac = $manager->getNbrRedac();
            $nbrRedacV = $manager->getNbrRedacV($id);
            $nbrRedacN = $manager->getNbrRedacN($id);
            //$nbrMots = $manager->getNbrMots($id);
        elseif($_SESSION['profil'] == 4):
            $articleMan = new ArticleManager();
            $redactionMan = new RedactionManager();
            $id = $_SESSION['idClient'];
            $client_infos = $_SESSION['idClient'];
            $nb_urg_articles = $articleMan->getNbCliUrgArticle($id);
            $nbArticles = $articleMan->getCliNbArticle($id);
            $nbArticleRediges = $articleMan->getCliArticleRed($id);
            $nbRedactionEnCours = $articleMan->getClieRecRun($id);
            $nbrMots = $articleMan->getNbrMots($id);
            $lasts_articles = $articleMan->getCliLastArticles($id);
        endif;

        /**
         * 
         * Faire des distinction à ce niveau
         * Assigner à chaq profil les statistiques à voir ou non
         * 
         * Liste des Stats
         * - Nombre d'articles rediges chaq mois
         * - Nombre de mots rediges chaq mois
         * - Nombre d'articles redigés par rédacteur, à ce niveau on aura juste une courbe, pas de label en dessous, les points serviront 
         * - Nombre d'articles rediges chaque mois par redacteur
         * 
         */

        $view = new View('home');
        
        if($_SESSION['profil'] == 1):
            $view->render(array(
                "titrePage" => "Tableau de bord",
                "article" => $article,
                "urgenceArticle" => $urgenceArticle,
                "nbrUsers" => $nbrUsers,
                "nbrModerateur" => $nbrModerateur,
                "nbrRedacteur" => $nbrRedacteur,
                "nbrArticle" => $nbrArticle
            ));
        elseif($_SESSION['profil'] == 3):
            $view->render(array(
                "titrePage" => "Tableau de bord",
                "article" => $article,
                "urgenceArticle" => $_SESSION['certification'] == 1 ? $urgenceArticle : "",
                "nbrRedactions" => $nbrRedactions,
                "nbrRedactionsS" => $nbrRedactionsS,
                "nbrRedactionsV" => $nbrRedactionsV,
                "nbrRedactionsN" => $nbrRedactionsN
            ));
        elseif($_SESSION['profil'] == 2):
            $view->render(array(
                "titrePage" => "Tableau de bord",
                "article" => $article,
                "urgenceArticle" => $urgenceArticle,
                "nbrRedacteur" => $nbrRedacteur,
                "nbrRedac" => $nbrRedac,
                "nbrRedacV" => $nbrRedacV,
                "nbrRedacN" => $nbrRedacN
            ));
        elseif($_SESSION['profil'] == 4):
            $view->render(array(
                "titrePage" => "Tableau de bord",
                "nb_urg_articles" => $nb_urg_articles,
                "client_infos" => $client_infos,
                "nbrMots" => $nbrMots,
                "nbArticleRediges" => $nbArticleRediges,
                "nbRedactionEnCours" => $nbRedactionEnCours,
                "nbArticles" => $nbArticles,
                "lasts_articles" => $lasts_articles,
            ));
        endif;

    }

    public function accueil($params) {

        $view = new Accueil('accueil');
        $view->render(array(
            "titrePage" => "Accueil",
        ));
    }

    public function page_produit($params) {

        $view = new PageProduit('page_produit');
        $view->render(array(
            "titrePage" => "Page Produit",
        ));
        
    }

    public function getBarChartData() {
        $manager = new RedactionManager(); 
        echo json_encode($manager->getBarChartData(), JSON_UNESCAPED_UNICODE);
    }

    public function getBarChartDataCli() {
        $manager = new RedactionManager(); 
        echo json_encode($manager->getBarChartDataCli(), JSON_UNESCAPED_UNICODE);
    }

}