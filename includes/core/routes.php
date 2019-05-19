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
    "users-new"=>function(){
        (new UserController)->showNewView();
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
    "users-api-new"=>function(){
        (new UserController)->newUser();
    },
    "about"=>function(){
        (new AboutController)->showView();
    }
];