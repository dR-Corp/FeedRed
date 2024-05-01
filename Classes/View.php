<?php


/**
 * class view
 * 
 * use to call views
 */

class View {

    private $template;

    public function __construct($template = null) {
        $this->template = $template;
    }

    public function render($params = array()) {

        // foreach($params as $name => $value) {
        //     ${name} = $value;
        // }
        extract($params); //faire une extraction de params

        $template = $this->template;
        
        ob_start();
        include(VIEW.'Scripts/script.php');
        $scripts = ob_get_clean();

        ob_start();
        include(VIEW.'_head.php');
        $head = ob_get_clean();

        ob_start();
        include(VIEW.'_navbar.php');
        $navbar = ob_get_clean();

        ob_start();
        include(VIEW.'_sidebar.php');
        $sidebar = ob_get_clean();

        ob_start();
        include(VIEW.'_footer.php');
        $footer = ob_get_clean();

        ob_start();
        include(CONTROLLER.'article_CRUD_JS.php');
        $article_CRUD_JS = ob_get_clean();

        ob_start();
        include(CONTROLLER.'commandes_CRUD_JS.php');
        $commandes_CRUD_JS = ob_get_clean();

        ob_start();
        include(CONTROLLER.'commandes_CRUD_JS_CLI.php');
        $commandes_CRUD_JS_CLI = ob_get_clean();

        ob_start();
        include(CONTROLLER.'article_CRUD_JS_CLI.php');
        $article_CRUD_JS_CLI = ob_get_clean();

        ob_start();
        include(CONTROLLER.'redaction_CRUD_JS.php');
        $redaction_CRUD_JS = ob_get_clean();

        ob_start();
        include(CONTROLLER.'redaction_CRUD_JS_2.php');
        $redaction_CRUD_JS_2 = ob_get_clean();

        ob_start();
        include(CONTROLLER.'redaction_CRUD_JS_MOD.php');
        $redaction_CRUD_JS_MOD = ob_get_clean();

        ob_start();
        include(CONTROLLER.'redaction_CRUD_JS_MOD_2.php');
        $redaction_CRUD_JS_MOD_2 = ob_get_clean();

        ob_start();
        include(CONTROLLER.'redaction_CRUD_JS_CLI.php');
        $redaction_CRUD_JS_CLI = ob_get_clean();
        
        ob_start();
        include(VIEW.$template.'.php');
        $contentPage = ob_get_clean();

        include_once(VIEW.'_template.php');

    }

    public function redirect($route) {
        header("Location: ".HOST.$route);
        exit;
    }

}