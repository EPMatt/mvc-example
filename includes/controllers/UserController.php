<?php
/**
 * The User Controller class
 * The controller for user management
 */
require_once "includes/model/Users.php";
class UserController extends Controller {
    protected $users;
    public function __construct() {
        $this->users = new Users(new DBConnector("includes/core/config.ini"), "users");
    }

    public function showView() {
        if (isset($_SESSION['admin'])) {
            $rs = $this->users->selectByFilter([]);
            require_once "includes/views/UserManagement.php";
        } else {
            require_once "includes/views/404.php";
        }
    }

    public function showEditView() {
        if (isset($_SESSION['admin'])) {
            $user = $this->users->selectByFilter(["id" => $_GET['id']])[0];
            require_once "includes/model/Provinces.php";
            $provincesDao = new Provinces(new DBConnector("config.ini"), "province");
            $provinces = $provincesDao->selectByFilter([]);
            require_once "includes/views/EditUser.php";
        } else {
            require_once "includes/views/404.php";
        }
    }

    public function updateUser() {
        if (isset($_SESSION['admin'])) {
            //get from post array
            $id = $_GET['id'];
            $user = $_POST['user'];
            $password = $_POST['pwd'];
            $cognome = $_POST['cognome'];
            $nome = $_POST['nome'];
            $data_nascita = $_POST['data_nascita'];
            $via = $_POST['via'];
            $provincia = $_POST['provincia'];
            $comune = $_POST['comune'];
            $tipologia = $_POST['tipologia'];
            if ($password == '') {
                //no change password
                $password = ($this->users->selectByFilter(["id" => $_GET['id']])[0])->getPassword();
            }
            //check data
            $safe_data = true;
            //insert
            if ($safe_data) {
                if ($this->users->update(new User($id, $user, $password, $cognome, $nome, $data_nascita, $via, $provincia, $comune, $tipologia))) {
                    $_SESSION['user'] = $_POST['user'];
                    header("Location: users-edit?id=$id&success");
                } else {
                    header("Location: users-edit?id=$id&error");
                }
            } else {
                header("Location: users-edit?id=$id&error");
            }
        } else {
            require_once "includes/views/404.php";
        }
    }

    public function deleteUser() {
        if (isset($_SESSION['admin'])) {
            $id=$_GET['id'];
            if($this->users->delete($this->users->selectByFilter(["id" => $id])[0])){
                header("Location: users?id=$id&delete-success");
            }else{
                header("Location: users?id=$id&delete-error");
            }
        } else {
            require_once "includes/views/404.php";
        }
    }

    public function signin() {
        $rs = $this->users->selectByFilter(["user" => $_POST['lg-usr'], "password" => $_POST['lg-pwd']]);
        if (count($rs) === 0) {
            header("Location: .?error");
        } else {
            $_SESSION['user'] = $rs[0]->getUser();
            if ($rs[0]->getTipologia() === 'Administrator') {
                $_SESSION['admin'] = true;
            }
            header("Location: .");
        }
    }

    public function signup() {
        //get from post array
        $user = $_POST['user'];
        $password = $_POST['pwd'];
        $cognome = $_POST['cognome'];
        $nome = $_POST['nome'];
        $data_nascita = $_POST['data_nascita'];
        $via = $_POST['via'];
        $provincia = $_POST['provincia'];
        $comune = $_POST['comune'];
        $tipologia = 'Client';
        //check data
        $safe_data = true;
        //insert
        if ($safe_data) {
            if ($this->users->insert(new User(null, $user, $password, $cognome, $nome, $data_nascita, $via, $provincia, $comune, $tipologia))) {
                $_SESSION['user'] = $_POST['user'];
                header("Location: .");
            } else {
                header("Location: .?errorsignup");
            }
        } else {
            header("Location: .?errorsignup");
        }
    }

    public function logout() {
        session_destroy();
        header("Location: .");
    }

    public function checkUsername() {
        $usr = $_POST['usr'];
        if (count($this->users->selectByFilter(["user" => $usr])) === 1) {
            echo 0;
        } else {
            echo 1;
        }
    }

    public function showNewView(){
        if (isset($_SESSION['admin'])) {
            require_once "includes/model/Provinces.php";
            $provincesDao = new Provinces(new DBConnector("config.ini"), "province");
            $provinces = $provincesDao->selectByFilter([]);
            require_once "includes/views/NewUser.php";
        } else {
            require_once "includes/views/404.php";
        }
    }

    public function newUser(){
        if (isset($_SESSION['admin'])) {
            //get from post array
            $id = $_GET['id'];
            $user = $_POST['user'];
            $password = $_POST['pwd'];
            $cognome = $_POST['cognome'];
            $nome = $_POST['nome'];
            $data_nascita = $_POST['data_nascita'];
            $via = $_POST['via'];
            $provincia = $_POST['provincia'];
            $comune = $_POST['comune'];
            $tipologia = $_POST['tipologia'];
            //check data
            $safe_data = true;
            //insert
            if ($safe_data) {
                if ($this->users->insert(new User($id, $user, $password, $cognome, $nome, $data_nascita, $via, $provincia, $comune, $tipologia))) {
                    $_SESSION['user'] = $_POST['user'];
                    header("Location: users?id=$id&new-success");
                } else {
                    header("Location: users-new?error");
                }
            } else {
                header("Location: users-new?error");
            }
        } else {
            require_once "includes/views/404.php";
        }
    }

}