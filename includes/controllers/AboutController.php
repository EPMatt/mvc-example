<?php
/**
 * The Home Controller class
 * The controller for the homepage
 */
class AboutController extends Controller{
   public function showView(){
       require_once "includes/views/About.php";
   }

}