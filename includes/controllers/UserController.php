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
        $rs = $this->users->selectByFilter([]);
        require_once "includes/views/UserManagement.php";
    }

    public function showEditView() {
        $user = $this->users->selectByFilter(["id" => $_GET['id']])[0];
        require_once "includes/model/Provinces.php";
        $provincesDao = new Provinces(new DBConnector("config.ini"), "province");
        $provinces = $provincesDao->selectByFilter([]);
        require_once "includes/views/EditUser.php";
    }

    public function updateUser() {
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
                header("Location: users-edit?id=$id&success");
            } else {
                header("Location: users-edit?id=$id&error");
            }
        } else {
            header("Location: users-edit?id=$id&error");
        }
    }

    public function deleteUsers() {
        $count = 0;
        foreach ($_POST as $key => $value) {
            $id = $key;
            if ($this->users->delete($this->users->selectByFilter(["id" => $id])[0])) {
                $count++;
            }

        }
        $total = count($_POST);
        if ($count === $total) {
            header("Location: users?delete-bulk-success&c=$count&t=$total");
        } else {
            header("Location: users?delete-bulk-error&c=$count&t=$total");
        }
        print_r($_POST);
    }

    public function deleteUser() {
        $id = $_GET['id'];
        if ($this->users->delete($this->users->selectByFilter(["id" => $id])[0])) {
            header("Location: users?id=$id&delete-success");
        } else {
            header("Location: users?id=$id&delete-error");
        }
    }

    public function signin() {
        $rs = $this->users->selectByFilter(["user" => $_POST['lg-usr'], "password" => $_POST['lg-pwd']]);
        if (count($rs) === 0) {
            header("Location: .?error");
        } else {
            $_SESSION['user'] = $rs[0]->getUser();
            $_SESSION['level'] = $rs[0]->getTipologia();
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
                $rs = $this->users->selectByFilter(["user" => $_POST['user'], "password" => $_POST['pwd']]);
                $_SESSION['user'] = $rs[0]->getUser();
                $_SESSION['level'] = $rs[0]->getTipologia();
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

    public function showNewView() {
        require_once "includes/model/Provinces.php";
        $provincesDao = new Provinces(new DBConnector("config.ini"), "province");
        $provinces = $provincesDao->selectByFilter([]);
        require_once "includes/views/NewUser.php";
    }

    public function newUser() {
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
    }

}