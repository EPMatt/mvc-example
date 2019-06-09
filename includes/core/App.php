<?php

/**
 * The App class
 * It takes care of checking routes and calling the requested controller
 */

require_once "includes/core/DBConnector.php";
spl_autoload_register(function ($class_name) {
    require_once "includes/controllers/$class_name.php";
});
class App {
    protected $route;
    private static $db;
    public function __construct() {
        session_start();
        $this->route = $_GET['url'];
    }
    public function makeRoute() {
        $route = self::$db->execute("SELECT * FROM Route WHERE name=:Route", ['Route' => $this->route]);
        if (count($route) != 0 && $this->hasPrivileges($route[0]['name'])) {
            //call the action
            $controller = new $route[0]['controller'];
            $function = $route[0]['function'];
            $controller->$function();
        } else if ($this->isLogged()) {
            require_once 'includes/views/404.php';
        } else {
            header('Location: .');
        }
    }

    /**
    * Check if the user has the privileges to perform the requested action
    */
    public static function hasPrivileges($route) {
        $priv = array_column(self::$db->execute("SELECT Level FROM Privilege WHERE Route=:Route", ['Route' => $route]), 'Level');
        $level = self::getUserLevel();
        return in_array('Public', $priv) || self::isLogged() && in_array('Logged', $priv, true) || in_array($level, $priv, true);
    }

    /**
     * Check whether the user is logged or not
     */
    public static function isLogged() {
        return isset($_SESSION['user']);
    }

    /**
     * Get the level for the user
     */
    public static function getUserLevel() {
        if (isset($_SESSION['level'])) {
            return $_SESSION['level'];
        } else {
            return 'Public';
        }

    }

    public static function init(){
        self::$db=new DBConnector('config.ini');
    }

}
//init the App class
App::init();