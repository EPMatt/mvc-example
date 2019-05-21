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
    "users-api-delete-bulk"=>function(){
        (new UserController)->deleteUsers();
    },
    "users-api-check"=>function(){
        (new UserController)->checkUsername();
    },
    "users-api-new"=>function(){
        (new UserController)->newUser();
    },
    "about"=>function(){
        (new AboutController)->showView();
    },
    "products"=>function(){
        (new ProductController)->showView();
    },
    "products-edit"=>function(){
        (new ProductController)->showEditView();
    },
    "products-new"=>function(){
        (new ProductController)->showNewView();
    },
    "products-api-update"=>function(){
        (new ProductController)->updateProduct();
    },
    "products-api-delete"=>function(){
        (new ProductController)->deleteProduct();
    },
    "products-api-delete-bulk"=>function(){
        (new ProductController)->deleteProducts();
    },
    "products-api-check"=>function(){
        (new ProductController)->checkProductCode();
    },
    "products-api-new"=>function(){
        (new ProductController)->newProduct();
    }
];