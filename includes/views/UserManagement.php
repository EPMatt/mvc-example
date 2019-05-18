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
        <div class="row align-items-center main justify-content-center">
            <div class="col">
                <h1>Users Management</h1>
                <p>Manage the DBOrders users from here</p>
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
                                <td><?= $user->getVia() . ", " . $user->getComune() . "(" . $user->getProvincia() . ")" ?></td>
                                <td><a class="btn btn-outline-danger" href="users-api-delete?id=<?= $user->getId() ?>">Delete</a> <a class="btn btn-outline-warning" href="users-edit?id=<?= $user->getId() ?>">Edit</a></td>
                            </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
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