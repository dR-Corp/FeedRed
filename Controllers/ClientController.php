<?php

//Client
// "client/articles.html" => ["controller" => "ClientController", "method" => "articles"],
// "client/redactions/encours.html" => ["controller" => "ClientController", "method" => "redactionsEnCours"],
// "client/articles/rediges.html" => ["controller" => "ClientController", "method" => "articlesRediges"],

/**
 * class Client
 * 
 * use to show the home page
 */
class ClientController {

    public function articles($params) {
        $manager = new ArticleManager();
        $nbArticleCli = $manager->getNbrArticleCli($_SESSION['idClient']);
        $view = new View('Article/show-client');
        $view->render(array(
            "titrePage" => "Articles",
            'nbArticle' => $nbArticleCli,
        ));
    }
    public function articlesLibres($params) {
        $manager = new ArticleManager();
        $nbArticleCliLibres = $manager->getNbrArticleCliLibres($_SESSION['idClient']);
        $view = new View('Article/libres-client');
        $view->render(array(
            "titrePage" => "Articles libres",
            'nbArticleCliLibres' => $nbArticleCliLibres,
        ));
    }
    public function articlesRediges($params) {
        $manager = new ArticleManager();
        $nbArticleCliRediges = $manager->getNbrArticleCliRediges($_SESSION['idClient']);
        $view = new View('Article/rediges-client');
        $view->render(array(
            "titrePage" => "Articles redigés",
            'nbArticleCliRediges' => $nbArticleCliRediges,
        ));
    }
    public function articlesPris($params) {
        $manager = new ArticleManager();
        $nbArticleCliPris = $manager->getNbrArticleCliPris($_SESSION['idClient']);
        $view = new View('Article/pris-client');
        $view->render(array(
            "titrePage" => "Articles pris",
            'nbArticleCliPris' => $nbArticleCliPris,
        ));
    }
    public function articlesLaisses($params) {
        $manager = new ArticleManager();
        $nbArticleCliLaisses = $manager->getNbrArticleCliLaisses($_SESSION['idClient']);
        $view = new View('Article/laisses-client');
        $view->render(array(
            "titrePage" => "Articles laissés",
            'nbArticleCliLaisses' => $nbArticleCliLaisses,
        ));
    }
    public function articlesLiberes($params) {
        $manager = new ArticleManager();
        $nbArticleCliLiberes = $manager->getNbrArticleCliLiberes($_SESSION['idClient']);
        $view = new View('Article/liberes-client');
        $view->render(array(
            "titrePage" => "Articles libérés",
            'nbArticleCliLiberes' => $nbArticleCliLiberes,
        ));
    }

    public function commandes($params) {

        $manager = new ArticleManager();
        $nbCommandes = $manager->getCliNbCommandes($_SESSION['idClient']);

        $view = new View('Article/commandes');
        $view->render(array(
            "titrePage" => "Commandes",
            // 'articles' => $articles,
            'nbCommandes' => $nbCommandes,
        ));
    }

    public function commandesArticles($params) {

        $manager = new ArticleManager();
        $nbCommandes = $manager->getNbCommandes();

        $view = new View('Article/commandes-client');
        $view->render(array(
            "titrePage" => "Commandes",
            'nbCommandes' => $nbCommandes,
        ));
    }

    public function redactionsEnCours($params) {

        $manager = new ArticleManager();
        $nbArticle = $manager->getClieRecRun($_SESSION['idClient']);

        $view = new View('Article/pris-client');
        $view->render(array(
            "titrePage" => "Rédactions en cours",
            // 'articles' => $articles,
            'nbArticle' => $nbArticle,
        ));
    }

    public function redactionsCli($params) {

        $manager = new RedactionManager();
        $nbRedactions = $manager->getNbrTousRedactionCli($_SESSION['idClient']);

        $view = new View('Redaction/show-cli');
        $view->render(array(
            "titrePage" => "Rédactions",
            'nbRedactions' => $nbRedactions,
        ));
    }

    public function avalideRedactionsCli($params) {
        $manager = new RedactionManager();
        $nbRedactions = $manager->getNbrAvalideRedactionCli($_SESSION['idClient']);
        $view = new View('Redaction/avalide-cli');
        $view->render(array(
            "titrePage" => "Rédactions à valider",
            'nbRedactions' => $nbRedactions,
        ));
    }

    public function nonvalideRedactionsCli($params) {
        $manager = new RedactionManager();
        $nbRedactions = $manager->getNbrNonValideRedactionCli($_SESSION['idClient']);
        $view = new View('Redaction/nonvalide-cli');
        $view->render(array(
            "titrePage" => "Rédactions invalidées",
            'nbRedactions' => $nbRedactions,
        ));
    }

    public function valideRedactionsCli($params) {
        $manager = new RedactionManager();
        $nbRedactions = $manager->getNbrValideRedactionCli($_SESSION['idClient']);
        $view = new View('Redaction/valide-cli');
        $view->render(array(
            "titrePage" => "Rédactions validées",
            'nbRedactions' => $nbRedactions,
        ));
    }


    // public function articlesRediges($params) {

    //     $manager = new ArticleManager();
    //     $nbArticle = $manager->getCliArticleRed($_SESSION['idClient']);
    //     // $articles = $manager->getCliArticles($_SESSION['idClient']);

    //     $view = new View('Article/rediges-client');
    //     $view->render(array(
    //         "titrePage" => "Articles redigés",
    //         // 'articles' => $articles,
    //         'nbArticle' => $nbArticle,
    //     ));
    // }

    public function getCliArticles($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getCliArticles($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }
    public function getCliArticlesLibres($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getCliArticlesLibres($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }
    public function getCliArticlesRediges($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getCliArticlesRediges($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }
    public function getCliArticlesPris($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getCliArticlesPris($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }
    public function getCliArticlesLaisses($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getCliArticlesLaisses($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }
    public function getCliArticlesLiberes($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getCliArticlesLiberes($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }

    public function getCommandes($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getCliCommandes($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }

    public function getCommandesArticles($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getCliCommandesArticles($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }

    public function getAllCommandes($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getAllCommandes(), JSON_UNESCAPED_UNICODE);
    }

    public function getCliRedrun($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getCliRedRunArticles($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }

    public function getCliRedArticles($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->getCliRedArticles($_SESSION['idClient']), JSON_UNESCAPED_UNICODE);
    }

    public function accepterCommande($params) {
        $manager = new ArticleManager();
        echo json_encode($manager->accepterCommande($params), JSON_UNESCAPED_UNICODE);
    }

}


?>