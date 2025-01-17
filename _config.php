<?php
/*** configuration *****/
ini_set('display_errors','on');
error_reporting(E_ALL);

class MyAutoload {
    
    public static function start() {

        spl_autoload_register(array(__CLASS__, 'autoload'));

        $root = $_SERVER['DOCUMENT_ROOT'];
        $host = $_SERVER['HTTP_HOST'];

        define('HOST', 'http://'.$host.'/FeedRed/');
        define('ROOT', $root.'/FeedRed/');

        define('CONTROLLER', ROOT.'Controllers/');
        define('VIEW', ROOT.'Views/');
        define('MODEL', ROOT.'Models/');
        define('CLASSES', ROOT.'Classes/');
        define('STORAGE', ROOT.'Storage/');

        define('ASSETS', HOST.'Assets/');
        define('STORAGES', HOST.'Storage/');
    }

    public static function autoload($class) {

        if(file_exists(MODEL.$class.'.php')) {
            include_once(MODEL.$class.'.php');
        }
        else if(file_exists(CONTROLLER.$class.'.php')) {
            include_once(CONTROLLER.$class.'.php');
        }
        else if(file_exists(CLASSES.$class.'.php')) {
            include_once(CLASSES.$class.'.php');
        }

        require_once 'vendor/autoload.php';
    }

    public static function sql_details() {
        return array ( 'user' => 'root', 'pass' => '', 'db'   => 'feedred', 'host' => '127.0.0.1' );
        // return array ( 'user' => 'feedredcom_feedred', 'pass' => '147feedred159', 'db'   => 'feedredcom_feedred', 'host' => '212.95.51.72' );
    }

    public static function dbconnect() {
        return new PDO("mysql:host=localhost;dbname=feedred;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        // return new PDO("mysql:host=212.95.51.72;dbname=feedredcom_feedred;charset=utf8", "feedredcom_feedred", "147feedred159", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }
    
}