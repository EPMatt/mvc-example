<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DBOrders! - Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>

<body class="text-center d-flex flex-column">
    <?php $home=''; require_once "includes/views/components/Navbar.php";?>
    <div class="container-fluid">
        <div class="row align-items-center main pt-5">
            <div class="col">
                <h1>Login to DBOrders</h1>
                <p>Please login to access the web service.</p>
                <div class="row justify-content-center">
                    <div class="col-lg-6 col">
                        <form method="post" action="signin" id="form-signin">
                            <div class="p-5">
                                <?=(isset($_GET['error'])) ? '<div class="alert alert-danger" role="alert">Wrong username or password</div>' : ((isset($_GET['errorsignup'])) ? '<div class="alert alert-danger" role="alert">Registration failed: Incorrect data supplied.</div>' : "");?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Username</span>
                                    </div>
                                    <input name="lg-usr" type="text" class="form-control" placeholder="Username">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Password</span>
                                    </div>
                                    <input type="password" class="form-control" placeholder="Password" id="lg-pwd">
                                    <input name="lg-pwd" type="hidden" id="lg-pwd-crypted">
                                </div>
                            </div>
                            <p class="lead">
                                <button type="button" class="btn btn-lg btn-primary"
                                    onclick='SHA2("lg-pwd","lg-pwd-crypted","form-signin")'>Sign In</button>
                            </p>
                            <a class="link" data-toggle="modal" data-target="#modal">Not already registered? <b>Sign
                                    Up</b></a>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>




    <form method="post" action="signup" id="form-submit">
        <div class="modal fade text-dark" id="modal" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sign Up</h5>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" class="form-control" name="nome" placeholder="John"
                                oninput='checkDataLength("firstname","firstname-sm",1,50)' id="firstname">
                            <small id="firstname-sm" class="form-text text-muted form-errors"></small>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" class="form-control" name="cognome" placeholder="Smith"
                                oninput='checkDataLength("lastname","lastname-sm",1,50)' id="lastname">
                            <small id="lastname-sm" class="form-text text-muted form-errors"></small>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="user" placeholder="johnsmith"
                                oninput='checkUsername(null)' id="username">
                            <small id="username-sm" class="form-text text-muted form-errors"></small>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Your password" id="pwd"
                                oninput='checkPassword(false);checkPasswords(false)'>
                            <small id="pwd-sm" class="form-text text-muted form-errors"></small>
                            <input name="pwd" type="hidden" id="pwd-crypted">
                        </div>
                        <div class="form-group">
                            <label for="password-renew">Repeat Password</label>
                            <input type="password" class="form-control" placeholder="Repeat your password"
                                id="pwd-renew" oninput='checkPasswords(false)'>
                            <small id="password-sm" class="form-text text-muted form-errors"></small>
                        </div>
                        <div class="form-group">
                            <label for="data_nascita">Birthdate</label>
                            <input type="date" class="form-control" name="data_nascita" placeholder="2018/01/01">
                        </div>
                        <div class="form-group">
                            <label for="via">Street</label>
                            <input type="text" class="form-control" name="via" placeholder="Baker Street 37B"
                                oninput='checkDataLength("via","via-sm",1,50)' id="via">
                            <small id="via-sm" class="form-text text-muted form-errors"></small>
                        </div>
                        <div class="form-group">
                            <label for="comune">City</label>
                            <input type="text" class="form-control" name="comune" placeholder="London"
                                oninput='checkDataLength("city","city-sm",1,50)' id="city">
                            <small id="city-sm" class="form-text text-muted form-errors"></small>
                        </div>
                        <div class="form-group">
                            <label for="provincia">Province</label>
                            <select class="form-control" name="provincia">
                                <?php
foreach ($provinces as $province) {
    ?>
                                <option value=<?=$province->getSigla();?>><?=$province->getNome();?></option>
                                <?php
}
?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick='SHA2("pwd","pwd-crypted","form-submit");'
                            id="submit-button">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var submitFoo = function(){SHA2("pwd","pwd-crypted","form-submit")};
    </script>
    <script type="text/javascript" src="js/app.js"></script>
    <?php include "includes/views/components/footer.php";?>
</body>

</html>