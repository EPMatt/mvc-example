<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DBOrders! - Edit User</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./datatables/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./datatables/Responsive-2.2.2/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="./datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">

</head>

<body class="d-flex flex-column">
    <?php require_once "includes/views/components/Navbar.php";?>
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col">
                <h1>User <?=$user->getUser()?></h1>
            </div>
        </div>
        <?=(isset($_GET['error'])) ? '<div class="alert alert-danger mb-4" role="alert">Error while updating the user</div>' : ((isset($_GET['success'])) ? '<div class="alert alert-success mb-4" role="alert">User updated successfully!</div>' : "");?>
        <form method="post" id="form-submit" action="users-api-update?id=<?=$user->getId()?>">
            <div class="row mb-3">
                <div class="col">
                    <h4>Personal info:</h4>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2 col-md-2">
                    <label for="username">Username</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" name="user" placeholder="johnsmith"
                        oninput='checkUsername("<?=$user->getUser()?>")' id="username" value=<?=$user->getUser()?>>
                    <small id="username-sm" class="form-text text-muted form-errors"></small>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="tipologia">Account Role</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <select class="form-control" name="tipologia">
                        <option value="Administrator"
                            <?=(($user->getTipologia() == 'Administrator') ? "selected" : "")?>>Administrator</option>
                        <option value="Employee" <?=(($user->getTipologia() == 'Employee') ? "selected" : "")?>>Employee
                        </option>
                        <option value="Client" <?=(($user->getTipologia() == 'Client') ? "selected" : "")?>>Client
                        </option>
                    </select>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2 col-md-2">
                    <label for="firstname">First Name</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" name="nome" placeholder="John"
                        oninput='checkDataTooLong("firstname","firstname-sm",50)' id="firstname"
                        value=<?=$user->getNome()?>>
                    <small id="firstname-sm" class="form-text text-muted form-errors"></small>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="firstname">Last Name</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" name="cognome" placeholder="Smith"
                        oninput='checkDataTooLong("lastname","lastname-sm",50)' id="lastname"
                        value=<?=$user->getCognome()?>>
                    <small id="lastname-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2">
                    <label for="data_nascita">Birthdate</label>
                </div>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="data_nascita" placeholder="2018/01/01"
                        value=<?=$user->getData_nascita()?>>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2">
                    <label for="via">Street</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="via" placeholder="Baker Street 37B"
                        oninput='checkDataTooLong("via","via-sm",50)' id="via" value=<?=$user->getVia()?>>
                    <small id="via-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2 col-md-2">
                    <label for="comune">City</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" name="comune" placeholder="London"
                        oninput='checkDataTooLong("city","city-sm",50)' id="city" value=<?=$user->getComune()?>>
                    <small id="city-sm" class="form-text text-muted form-errors"></small>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="provincia">Province</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <select class="form-control" name="provincia">
                        <?php
                            foreach ($provinces as $province) {
                        ?>
                        <option value=<?=$province->getSigla()?>
                            <?=(($user->getProvincia() == $province->getSigla()) ? "selected" : "")?>>
                            <?=$province->getNome();?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <hr class="my-5">
            <div class="row mb-3">
                <div class="col">
                    <h4>Security:</h4>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2">
                    <label for="password">New Password</label>
                </div>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="The new password" id="pwd"
                        oninput='checkPassword(true);checkPasswords(true)'>
                    <small id="pwd-sm" class="form-text text-muted form-errors"></small>
                    <input name="pwd" type="hidden" id="pwd-crypted">
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2">
                    <label for="password-renew">Repeat Password</label>
                </div>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Repeat password" id="pwd-renew"
                        oninput='checkPasswords(true)'>
                    <small id="password-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
        </form>
        <div class="row justify-content-between mt-5">
            <a href="users" class="btn btn-secondary">Go back</a>
            <button class="btn btn-primary" onclick='updateSHA2("pwd","pwd-crypted","form-submit");'
                id="submit-button">Update
                user</button>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var submitFoo = function () { updateSHA2("pwd", "pwd-crypted", "form-submit") };
    </script>
    <script type="text/javascript" src="js/app.js"></script>
    <?php include "includes/views/components/footer.php";?>
</body>

</html>