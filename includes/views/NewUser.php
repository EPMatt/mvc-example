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
                <h1>New User</h1>
            </div>
        </div>
        <?=(isset($_GET['error']) ? '<div class="alert alert-danger mb-4" role="alert">Unable to add the user</div>' : '');?>
        <form method="post" id="form-submit" action="users-api-new">
            <div class="row mb-3">
                <div class="col">
                    <h4>Personal info:</h4>
                </div>
            </div>
            <div class="form-group row align-items-baseline">
                <div class="col-sm-2 col-md-2">
                    <label for="username">Username</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" name="user" placeholder="johnsmith"
                        oninput='checkUsername(null)' id="username" required>
                    <small id="username-sm" class="form-text text-muted form-errors"></small>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="tipologia">Account Role</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <select class="form-control" name="tipologia">
                        <option value="Administrator">Administrator</option>
                        <option value="Employee">Employee</option>
                        <option value="Client">Client</option>
                    </select>
                </div>
            </div>
            <div class="form-group row align-items-baseline">
                <div class="col-sm-2 col-md-2">
                    <label for="firstname">First Name</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" name="nome" placeholder="John"
                        oninput='checkDataLength("firstname","firstname-sm",1,50)' id="firstname">
                    <small id="firstname-sm" class="form-text text-muted form-errors"></small>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="firstname">Last Name</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" name="cognome" placeholder="Smith"
                        oninput='checkDataLength("lastname","lastname-sm",1,50)' id="lastname">
                    <small id="lastname-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
            <div class="form-group row align-items-baseline">
                <div class="col-sm-2">
                    <label for="data_nascita">Birthdate</label>
                </div>
                <div class="col-sm-10">
                <input type="date" class="form-control" name="data_nascita" oninput='checkDataLength("data_nascita","data_nascita-sm",1,50)' id="data_nascita">
                            <small id="data_nascita-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
            <div class="form-group row align-items-baseline">
                <div class="col-sm-2">
                    <label for="via">Street</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="via" placeholder="Baker Street 37B"
                        oninput='checkDataLength("via","via-sm",1,50)' id="via">
                    <small id="via-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
            <div class="form-group row align-items-baseline">
                <div class="col-sm-2 col-md-2">
                    <label for="comune">City</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" name="comune" placeholder="London"
                        oninput='checkDataLength("city","city-sm",1,50)' id="city">
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
                            >
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
            <div class="form-group row align-items-baseline">
                <div class="col-sm-2">
                    <label for="password">User Password</label>
                </div>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="The new password" id="pwd"
                        oninput='checkPassword(false);checkPasswords(false)'>
                    <small id="pwd-sm" class="form-text text-muted form-errors"></small>
                    <input name="pwd" type="hidden" id="pwd-crypted">
                </div>
            </div>
            <div class="form-group row align-items-baseline">
                <div class="col-sm-2">
                    <label for="password-renew">Repeat Password</label>
                </div>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Repeat password" id="pwd-renew"
                        oninput='checkPasswords(false)'>
                    <small id="password-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
        </form>
        <div class="row mt-5">
            <div class="col-md-6 col-sm-12 mb-4 crud-button-left"><a href="users" class="btn btn-secondary">Go back</a></div>
            <div class="col-md-6 col-sm-12 mb-4 crud-button-right"><button class="btn btn-primary" onclick='newUser("pwd","pwd-crypted","form-submit");'
                id="submit-button">Add user</button></div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var submitFoo = function () { newUser("pwd", "pwd-crypted", "form-submit") };
    </script>
    <script type="text/javascript" src="js/app.js"></script>
    <?php include "includes/views/components/footer.php";?>
</body>

</html>