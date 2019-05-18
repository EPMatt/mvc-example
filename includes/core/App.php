<?php

/**
 * The App class
 * It takes care of checking routes and calling the requested controller
 */

require_once "routes.php";
function __autoload($class_name){
    require_once "includes/controllers/$class_name.php";
}
class App {
    protected $route;
    public function __construct() {
        session_start();
        $this->route = $_GET['url'];
    }
    public function makeRoute() {
        global $routes;
        if (array_key_exists($this->route, $routes)) {
            $routes[$this->route]->__invoke();
        } else {
            require_once"includes/views/404.php";
        }

    }
}