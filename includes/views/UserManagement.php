<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DBOrders! - Users</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./datatables/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./datatables/Responsive-2.2.2/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="./datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">

</head>

<body class="text-center d-flex flex-column">
    <?php require_once "includes/views/components/Navbar.php"; ?>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col">
                <h1>Users Management</h1>
                <p>Manage the DBOrders users from here</p>
            </div>
        </div>
        <?=(isset($_GET['delete-error'])) ?  "<div class=\"alert alert-danger mb-4\" role=\"alert\">Error while deleting user $_GET[id].</div>" : ((isset($_GET['delete-success'])) ? "<div class=\"alert alert-success mb-4\" role=\"alert\">User $_GET[id] deleted successfully!</div>" :  ((isset($_GET['new-success'])) ? "<div class=\"alert alert-success mb-4\" role=\"alert\">User $_GET[id] successfully created!</div>" : ""));?>
        <div class="row justify-content-center my-5">
            <div class="col">
                <table id="users_table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Account Type</th>
                            <th>Full Name</th>
                            <th>Birthdate</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($rs as $user) {
                            ?>
                        <tr>
                            <td><?= $user->getUser() ?></td>
                            <td><?= $user->getTipologia() ?></td>
                            <td><?= $user->getNome() . " " . $user->getCognome() ?></td>
                            <td><?= $user->getData_nascita() ?></td>
                            <td><?= $user->getVia() . ", " . $user->getComune() . "(" . $user->getProvincia() . ")" ?>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center"><a
                                        href="users-delete?id=<?= $user->getId() ?>">
                                        <div
                                            class="crud-icon crud-icon-delete d-flex justify-content-center align-items-center">
                                            <img width="18px" height="18px" src="img/trashcan.svg">
                                        </div>
                                    </a>
                                    <a href="users-edit?id=<?= $user->getId() ?>">
                                        <div
                                            class="crud-icon crud-icon-edit d-flex justify-content-center align-items-center">
                                            <img width="18px" height="18px" src="img/pencil.svg">
                                        </div>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <a class="btn btn-primary" href="users-new">New User</a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <!--Here it goes Datatables-->
    <script type="text/javascript" src="./datatables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./datatables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="./datatables/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript">
    $('#users_table').DataTable({
        responsive: true
    });
    </script>
    <?php include "includes/views/components/footer.php"; ?>
</body>

</html>