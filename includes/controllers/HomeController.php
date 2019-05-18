<?php
/**
 * The Home Controller class
 * The controller for the homepage
 */
class HomeController extends Controller{
   public function showView(){
       if(isset($_SESSION['user'])){
            require_once "includes/views/Home.php";
       }else{
            require_once "includes/model/Provinces.php";
            $provincesDao=new Provinces(new DBConnector("config.ini"),"province");
            $provinces=$provincesDao->selectByFilter([]);
            require_once "includes/views/Login.php";
       }
   }

}