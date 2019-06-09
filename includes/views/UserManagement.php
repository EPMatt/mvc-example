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
    <?php $users = '';require_once "includes/views/components/Navbar.php";?>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col">
                <h1>Users Management</h1>
                <p>Manage the DBOrders users from here</p>
            </div>
        </div>
        <?php
        if(isset($_GET['delete-error']))  echo "<div class=\"alert alert-danger mb-4\" role=\"alert\">Error while deleting user $_GET[id].</div>";
        else if(isset($_GET['delete-success'])) echo "<div class=\"alert alert-success mb-4\" role=\"alert\">User $_GET[id] deleted successfully!</div>";
        else if(isset($_GET['new-success'])) echo "<div class=\"alert alert-success mb-4\" role=\"alert\">User $_GET[id] successfully created!</div>";
        else if(isset($_GET['delete-bulk-success'])) echo "<div class=\"alert alert-success mb-4\" role=\"alert\">$_GET[c] out of $_GET[t] users successfully deleted!</div>";
        else if(isset($_GET['delete-bulk-error'])) echo "<div class=\"alert alert-danger mb-4\" role=\"alert\">$_GET[c] out of $_GET[t] users deleted</div>";
        ?>
        <div class="row justify-content-center my-5">
            <div class="col">
                <form id="users-form" method="post">
                    <table id="users_table">
                        <thead>
                            <tr>
                                <th class="all">Username</th>
                                <th>Account Type</th>
                                <th>Full Name</th>
                                <th>Birthdate</th>
                                <th>Address</th>
                                <th class="all">Actions</th>
                                <th class="check-th all text-center"><input type="checkbox" class="check"
                                        onchange="updateBulkSelection()" id="bulkCheck"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
foreach ($rs as $user) {
    ?>
                            <tr>
                                <td><?=$user->getUser()?></td>
                                <td><?=$user->getTipologia()?></td>
                                <td><?=$user->getNome() . " " . $user->getCognome()?></td>
                                <td><?=$user->getData_nascita()?></td>
                                <td><?=$user->getVia() . ", " . $user->getComune() . "(" . $user->getProvincia() . ")"?>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center"><a
                                            href="users-api-delete?id=<?=$user->getId()?>">
                                            <div
                                                class="crud-icon crud-icon-delete d-flex justify-content-center align-items-center">
                                                <img width="18px" height="18px" src="img/trashcan.svg">
                                            </div>
                                        </a>
                                        <a href="users-edit?id=<?=$user->getId()?>">
                                            <div
                                                class="crud-icon crud-icon-edit d-flex justify-content-center align-items-center">
                                                <img width="18px" height="18px" src="img/pencil.svg">
                                            </div>
                                        </a>
                                    </div>
                                </td>
                                <td class="text-center"><input name="<?=$user->getId()?>" type="checkbox" class="check elem-check"
                                        onchange="updateSelections()"></td>
                            </tr> <?php
}
?> </tbody>
                    </table>
                </form> <a class="btn btn-primary mt-5" href="users-new">New User</a>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <!--Here it goes Datatables-->
    <script type="text/javascript" src="./datatables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="./datatables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="./datatables/Responsive-2.2.2/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript">
    $('document').ready(function() {
        $('#users_table').DataTable({
            responsive: true
        });
        $('#users_table_filter input').get(0).type= "search";
        $('#users_table_filter input').on('input',function(){
            document.getElementById('bulkCheck').checked=false;
            document.getElementById('bulkCheck').indeterminate=false;
            updateBulkSelection();
        });
        $('#users_table_wrapper>:nth-child(1)>:nth-child(1)').removeClass('col-md-6').addClass('col-md-3');
        $('#users_table_wrapper>:nth-child(1)>:nth-child(2)').before($('<div></div>').addClass(
            'col-sm-12 col-md-3 text-center').prop('id', 'table_bulk').html(
            '<select onchange="if(this.options[this.selectedIndex].value==\'d\')deleteUsers();" class="form-control form-control-sm"><option value="" selected disabled hidden>Bulk Actions</option><option value="d">Delete Selected</option></select>'
            ));
        $('#users_table_wrapper>:nth-child(1)').addClass('align-items-center justify-content-center');
        $('#users_table_wrapper>:nth-child(1) label').addClass('mb-0');
        $('#users_table_wrapper>:nth-child(1)>*').addClass('my-2');
    });
    </script>
    <?php include "includes/views/components/footer.php";?>
</body>

</html>