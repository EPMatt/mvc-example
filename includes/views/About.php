<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DBOrders! - About</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>

<body class="d-flex flex-column">
    <?php $about=''; require_once "includes/views/components/Navbar.php";?>
    <div class="container mt-5">
        <div class="row mb-5">
            <div class="col">
                <h1>About DBOrders...</h1>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col">
            DBOrders is property work of <a class="text-reset" href="https://epmatt.com">Matteo Agnoletto (@EPMatt)</a>.
            <br><br>
            The relational database which the web app is built on is based on the MySQL <a class="text-reset" href="http://www.mysqltutorial.org/wp-content/uploads/2018/03/mysqlsampledatabase.zip">classicmodels sample database</a> from <a class="text-reset"  href="http://www.mysqltutorial.org/">MySQL Tutorial</a>. Licensing information can be found in the website.
            <br><br>
            The web app uses <a class="text-reset"  href="https://datatables.net/">DataTables</a> for adding functionality to HTML tables. DataTables is licensed under the <a class="text-reset"  href="./lic/datatables.txt">MIT License</a>.
            <br><br>
            Fonts from the <a  class="text-reset" href="https://github.com/rsms/inter">Inter font family</a> are used. These fonts are licensed under the <a class="text-reset"  href="./lic/inter.txt">MIT License</a>.
            <br><br>
            The web app also uses Github's <a class="text-reset" href="https://github.com/primer/octicons/">Octicons</a>. Octicons are licensed under the <a class="text-reset" href="./lic/octicons.txt">MIT License</a>.
            <br><br>
            DBOrders is built over Twitter's <a class="text-reset" href="https://getbootstrap.com/">Bootstrap framework</a>. Bootstrap is licensed under the <a class="text-reset" href="./lic/bootstrap.txt">MIT License</a>.
            </div>
        </div>
        <div class="row">
            <div class="col">
            Made with ❤, hosted on <a  class="text-reset" href="https://github.com/EPMatt/mvc-example">GitHub</a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <?php include "includes/views/components/footer.php";?>
</body>

</html>