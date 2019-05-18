<?php
$routes=[
    "signup"=>function(){
        (new UserController)->signup();
    },
    "signin"=>function(){
        (new UserController)->signin();
    },
    "index.php"=>function(){
        (new HomeController)->showView();
    },
    "logout"=>function(){
        (new UserController)->logout();
    },
    "users"=>function(){
        (new UserController)->showView();
    },
    "users-edit"=>function(){
        (new UserController)->showEditView();
    },
    "users-api-update"=>function(){
        (new UserController)->updateUser();
    },
    "users-api-delete"=>function(){
        (new UserController)->deleteUser();
    },
    "users-api-check"=>function(){
        (new UserController)->checkUsername();
    },
    "about"=>function(){
        (new AboutController)->showView();
    }
];