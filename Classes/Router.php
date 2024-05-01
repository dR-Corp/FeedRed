<?php

/**
 * class Router
 * 
 * create routes and find controllers
 */
class Router {

    private $request;

    private $routes = [
        "accueil.html" => ["controller" => "HomeController", "method" => "accueil"],
        "page-produit.html" => ["controller" => "HomeController", "method" => "page_produit"],
        "home.html" => ["controller" => "HomeController", "method" => "showHome"],

        //dashboard management
        "getBarChartData.html" => ["controller" => "HomeController", "method" => "getBarChartData"],
        "getBarChartDataCli.html" => ["controller" => "HomeController", "method" => "getBarChartDataCli"],

        "article.html" => ["controller" => "ArticleController", "method" => "showArticle"],
        "reload-article.html" => ["controller" => "ArticleController", "method" => "reloadArticle"],
        //admin and mod
        "add-article.html" => ["controller" => "ArticleController", "method" => "saveArticle"],
        "up-article.html" => ["controller" => "ArticleController", "method" => "saveArticle"],
        "del-article.html" => ["controller" => "ArticleController", "method" => "delArticle"],
        //cli
        "add-article_cli.html" => ["controller" => "ArticleController", "method" => "saveArticleCli"],
        "add_redaction_cli.html" => ["controller" => "ArticleController", "method" => "saveRedactionCli"],
        "up-article_cli.html" => ["controller" => "ArticleController", "method" => "saveArticle"],
        "del-article_cli.html" => ["controller" => "ArticleController", "method" => "delArticle"],

        "detail-article.html" => ["controller" => "ArticleController", "method" => "detailArticle"],
        "detail-article-cli.html" => ["controller" => "ArticleController", "method" => "detailArticleCli"],
        "vue-article.html" => ["controller" => "ArticleController", "method" => "vueArticle"],
        "list-article.html" => ["controller" => "ArticleController", "method" => "listArticle"],
        "prendre-article.html" => ["controller" => "ArticleController", "method" => "setArticle"],
        "laisser-article.html" => ["controller" => "ArticleController", "method" => "relArticle"],
        "liberer-article.html" => ["controller" => "ArticleController", "method" => "freeArticle"],
        "users.html" => ["controller" => "UsersController", "method" => "showUsers"],
        "login.html" => ["controller" => "UsersController", "method" => "login"],
        "profil.html" => ["controller" => "UsersController", "method" => "profilUsers"],
        "log.html" => ["controller" => "UsersController", "method" => "log"],
        "logout.html" => ["controller" => "UsersController", "method" => "logout"],
        "add-users.html" => ["controller" => "UsersController", "method" => "saveUsers"],
        "up-users.html" => ["controller" => "UsersController", "method" => "saveUsers"],
        "update-users.html" => ["controller" => "UsersController", "method" => "saveSelf"],
        "del-users.html" => ["controller" => "UsersController", "method" => "delUsers"],
        "detail-users.html" => ["controller" => "UsersController", "method" => "detailUsers"],
        "activer-users.html" => ["controller" => "UsersController", "method" => "activeUsers"],
        "desactiver-users.html" => ["controller" => "UsersController", "method" => "inactiveUsers"],
        "certified-users.html" => ["controller" => "UsersController", "method" => "certifiedUsers"],
        "uncertified-users.html" => ["controller" => "UsersController", "method" => "uncertifiedUsers"],
        "redaction.html" => ["controller" => "RedactionController", "method" => "showRedaction"],
        "redactions.html" => ["controller" => "RedactionController", "method" => "showRedactions"],
        "urgent-redactions.html" => ["controller" => "RedactionController", "method" => "showUrgentRedactions"],
        "afficher-redaction.html" => ["controller" => "RedactionController", "method" => "afficher"],
        "reload-redaction.html" => ["controller" => "RedactionController", "method" => "reloadRedaction"],
        "reload-redaction-cli.html" => ["controller" => "RedactionController", "method" => "reloadRedactionCli"],
        "reload-redaction-urgent.html" => ["controller" => "RedactionController", "method" => "reloadRedactionUrgent"],
        "afficher-redaction-pdf.html" => ["controller" => "RedactionController", "method" => "afficherPdf"],
        "soumettre-redaction.html" => ["controller" => "RedactionController", "method" => "soumettre"],
        "resoumettre-redaction.html" => ["controller" => "RedactionController", "method" => "resoumettre"],
        "valider-redaction.html" => ["controller" => "RedactionController", "method" => "valider"],
        //"check-redaction.html" => ["controller" => "RedactionController", "method" => "check"],
        "corriger-redaction.html" => ["controller" => "RedactionController", "method" => "corriger"],
        "refuser-redaction.html" => ["controller" => "RedactionController", "method" => "refuser"],
        "historique.html" => ["controller" => "RedactionController", "method" => "showHistorique"],
        "ajax-redaction.html" => ["controller" => "RedactionController", "method" => "ajaxRedaction"],
        "detail-redaction.html" => ["controller" => "RedactionController", "method" => "detailRedaction"],
        "detail-ad-redaction.html" => ["controller" => "RedactionController", "method" => "detailAdRedaction"],

        "facture-red.html" => ["controller" => "FactureController", "method" => "factureRed"],
        "facture-mod.html" => ["controller" => "FactureController", "method" => "factureMod"],
        "factures.html" => ["controller" => "FactureController", "method" => "factures"],
        "factures-detail.html" => ["controller" => "FactureController", "method" => "facturesDetail"],
        "factures-detail2.html" => ["controller" => "FactureController", "method" => "facturesDetail2"],

        
        "ajout-article.html" => ["controller" => "ArticleController", "method" => "ajoutArticle"],
        "libres-article.html" => ["controller" => "ArticleController", "method" => "libresArticle"],
        "pris-article.html" => ["controller" => "ArticleController", "method" => "prisArticle"],
        "laisses-article.html" => ["controller" => "ArticleController", "method" => "laissesArticle"],
        "liberes-article.html" => ["controller" => "ArticleController", "method" => "liberesArticle"],
        "rediges-article.html" => ["controller" => "ArticleController", "method" => "redigesArticle"],
        "urgents-article.html" => ["controller" => "ArticleController", "method" => "urgentsArticle"],
        "articles-urgents.html" => ["controller" => "ArticleController", "method" => "articlesUrgents"],
        
        "reload-limit.html" => ["controller" => "ArticleController", "method" => "reloadLimit"],
        "reload-article-libres.html" => ["controller" => "ArticleController", "method" => "reloadArticleLibres"],
        "reload-article-urgent-libres.html" => ["controller" => "ArticleController", "method" => "reloadArticleUrgentLibres"],
        "reload-article-urgent.html" => ["controller" => "ArticleController", "method" => "reloadArticleUrgents"],
        
        "reload-article-pris.html" => ["controller" => "ArticleController", "method" => "reloadArticlePris"],
        "reload-article-laisses.html" => ["controller" => "ArticleController", "method" => "reloadArticleLaisses"],
        "reload-article-liberes.html" => ["controller" => "ArticleController", "method" => "reloadArticleLiberes"],
        "reload-article-rediges.html" => ["controller" => "ArticleController", "method" => "reloadArticleRediges"],

        "validation-redactions.html" => ["controller" => "RedactionController", "method" => "validationRedactions"],
        "valide-redactions.html" => ["controller" => "RedactionController", "method" => "valideRedactions"],
        "avalide-redactions.html" => ["controller" => "RedactionController", "method" => "avalideRedactions"],
        "nonvalide-redactions.html" => ["controller" => "RedactionController", "method" => "nonvalideRedactions"],
        "refuse-redactions.html" => ["controller" => "RedactionController", "method" => "refuseRedactions"],
        "correction-redaction.html" => ["controller" => "RedactionController", "method" => "correction"],
        
        "reload-redaction-validable.html" => ["controller" => "RedactionController", "method" => "reloadRedactionValidable"],
        "reload-redaction-validable-cli.html" => ["controller" => "RedactionController", "method" => "reloadRedactionValidableCli"],
        "reload-redaction-valide.html" => ["controller" => "RedactionController", "method" => "reloadRedactionValide"],
        "reload-redaction-valide-cli.html" => ["controller" => "RedactionController", "method" => "reloadRedactionValideCli"],
        "reload-redaction-avalide.html" => ["controller" => "RedactionController", "method" => "reloadRedactionAvalide"],
        "reload-redaction-avalide-cli.html" => ["controller" => "RedactionController", "method" => "reloadRedactionAvalideCli"],
        "reload-redaction-nonvalide.html" => ["controller" => "RedactionController", "method" => "reloadRedactionNonvalide"],
        "reload-redaction-nonvalide-cli.html" => ["controller" => "RedactionController", "method" => "reloadRedactionNonvalideCli"],
        "reload-redaction-refuse.html" => ["controller" => "RedactionController", "method" => "reloadRedactionRefuse"],
        // "ajouter-article.html" => ["controller" => "ArticleController", "method" => "ajouterArticle"],
        // "checking-redactions.html" => ["controller" => "RedactionController", "method" => "checkingRedactions"],
        
        "contacts.html" => ["controller" => "ContactController", "method" => "show"],
        "reload-contact.html" => ["controller" => "ContactController", "method" => "reloadContact"],
        "contacter.html" => ["controller" => "ContactController", "method" => "contacter"],
        "traiter-contact.html" => ["controller" => "ContactController", "method" => "traiter"],
        "lire-contact.html" => ["controller" => "ContactController", "method" => "voir"],
        "archiver-contact.html" => ["controller" => "ContactController", "method" => "archiver"],
        "del-contact.html" => ["controller" => "ContactController", "method" => "delete"],

        "show-notif.html" => ["controller" => "UsersController", "method" => "showNotif"],
        "hide-notif.html" => ["controller" => "UsersController", "method" => "hideNotif"],

        "ajout-termine.html" => ["controller" => "ArticleController", "method" => "ajoutTermine"],
        "add-article-off.html" => ["controller" => "FactureController", "method" => "addArticleOff"],

        //facture management
        "fin-periode.html" => ["controller" => "FactureController", "method" => "endPeriode"],
        "exporter-fiche.html" => ["controller" => "FactureController", "method" => "exportFiche"],
        "valider-facture.html" => ["controller" => "FactureController", "method" => "validateFacture"],

        // Agence account management
        "add-article-off.html" => ["controller" => "FactureController", "method" => "addArticleOff"],
        "del-article-off.html" => ["controller" => "FactureController", "method" => "delArticleOff"],

        //Client
        "client-articles.html" => ["controller" => "ClientController", "method" => "articles"],
        "client-articles-libres.html" => ["controller" => "ClientController", "method" => "articlesLibres"],
        "client-articles-rediges.html" => ["controller" => "ClientController", "method" => "articlesRediges"],
        "client-articles-pris.html" => ["controller" => "ClientController", "method" => "articlesPris"],
        "client-articles-laisses.html" => ["controller" => "ClientController", "method" => "articlesLaisses"],
        "client-articles-liberes.html" => ["controller" => "ClientController", "method" => "articlesLiberes"],

        "get-cli-articles.html" => ["controller" => "ClientController", "method" => "getCliArticles"],
        "get-cli-articles-libres.html" => ["controller" => "ClientController", "method" => "getCliArticlesLibres"],
        "get-cli-articles-rediges.html" => ["controller" => "ClientController", "method" => "getCliArticlesRediges"],
        "get-cli-articles-pris.html" => ["controller" => "ClientController", "method" => "getCliArticlesPris"],
        "get-cli-articles-laisses.html" => ["controller" => "ClientController", "method" => "getCliArticlesLaisses"],
        "get-cli-articles-liberes.html" => ["controller" => "ClientController", "method" => "getCliArticlesLiberes"],

        "commandes.html" => ["controller" => "ClientController", "method" => "commandes"],
        "commandes-articles.html" => ["controller" => "ClientController", "method" => "commandesArticles"],
        "get-commandes.html" => ["controller" => "ClientController", "method" => "getCommandes"],
        "get-commandes-articles.html" => ["controller" => "ClientController", "method" => "getCommandesArticles"],
        "get-all-commandes.html" => ["controller" => "ClientController", "method" => "getAllCommandes"],
        
        "client-redactions-encours.html" => ["controller" => "ClientController", "method" => "redactionsEnCours"],
        "get-cli-redrun.html" => ["controller" => "ClientController", "method" => "getCliRedrun"],

        "client-articles-rediges.html" => ["controller" => "ClientController", "method" => "articlesRediges"],
        "get-cli-red-articles.html" => ["controller" => "ClientController", "method" => "getCliRedArticles"],
        "accepter-commande.html" => ["controller" => "ClientController", "method" => "accepterCommande"],

        "redactions-cli.html" => ["controller" => "ClientController", "method" => "redactionsCli"],
        "avalide-redactions-cli.html" => ["controller" => "ClientController", "method" => "avalideRedactionsCli"],
        "nonvalide-redactions-cli.html" => ["controller" => "ClientController", "method" => "nonvalideRedactionsCli"],
        "valide-redactions-cli.html" => ["controller" => "ClientController", "method" => "valideRedactionsCli"],
        
        //Outils
        "outils.html" => ["controller" => "ToolController", "method" => "show"],

    ];

    public function __construct($request) {
        $this->request = $request;
    }

    public function getRoute() {
        $elements = explode('~', $this->request);
        //echo '<pre>'; print_r($elements); exit;
        return $elements[0];
    }

    public function getParams() {

        $params = null;

        // extract GET params
        $elements = explode('~', $this->request);
        unset($elements[0]);
        for($i = 1; $i < count($elements); $i++) {
            $params[$elements[$i]] = htmlspecialchars($elements[$i+1]);
            $i++;
        }

        // extract POST params
        if($_POST) {
            foreach($_POST as $key => $val ) {
                $params[$key] = $val;
            }
        }

        return $params;
    }

    public function renderController() {

        $route = $this->getRoute();
        $params = $this->getParams();

        if(key_exists($route, $this->routes)) {
            
            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];

            $currentController = new $controller();
            $currentController->$method($params);
        }
        else {
            //echo "404";
            $error404 = new Error404();
            $error404->render();
        }
    }

    public function redirect($redirect, $request) {
        if(key_exists($request, $this->routes)) { 
            header("Location: ".HOST.$redirect);
            exit;
        }
    }
}