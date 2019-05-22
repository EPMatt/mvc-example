<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DBOrders! - Home</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>

<body class="text-center d-flex flex-column">
    <?php $home=''; require_once "includes/views/components/Navbar.php";?>
    <div class="container-fluid">
    <div class="row align-items-center main">
            <div class="col">
                <h1>Welcome to DBOrders, <?=$_SESSION['user']?>!</h1>
                <p>Browse the products database from here!</p>
                <a  href="products" class="btn btn-primary">List Products</a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <?php include "includes/views/components/ParticlesBackground.php"?>
    <?php include "includes/views/components/footer.php";?>
</body>

</html>