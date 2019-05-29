<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DBOrders! - Products</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./datatables/DataTables-1.10.18/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./datatables/Responsive-2.2.2/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="./datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">

</head>

<body class="text-center d-flex flex-column">
    <?php $products = '';require_once "includes/views/components/Navbar.php";?>
    <div class="container">
        <div class="row justify-content-center my-5">
            <div class="col">
                <h1>Products List</h1>
                <p>Browse the products database from here.</p>
            </div>
        </div>
        <?php
        if(isset($_GET['delete-error']))  echo "<div class=\"alert alert-danger mb-4\" role=\"alert\">Error while deleting product $_GET[id].</div>";
        else if(isset($_GET['delete-success'])) echo "<div class=\"alert alert-success mb-4\" role=\"alert\">Product $_GET[id] deleted successfully!</div>";
        else if(isset($_GET['new-success'])) echo "<div class=\"alert alert-success mb-4\" role=\"alert\">Product $_GET[id] successfully created!</div>";
        else if(isset($_GET['delete-bulk-success'])) echo "<div class=\"alert alert-success mb-4\" role=\"alert\">$_GET[c] out of $_GET[t] products successfully deleted!</div>";
        else if(isset($_GET['delete-bulk-error'])) echo "<div class=\"alert alert-danger mb-4\" role=\"alert\">$_GET[c] out of $_GET[t] products deleted</div>";
        ?>
        <div class="row justify-content-center my-5">
            <div class="col">
                <form id="products-form" method="post">
                    <table id="products_table">
                        <thead>
                            <tr>
                                <th class="all">Product Code</th>
                                <th>Product Name</th>
                                <th>Product Line</th>
                                <th>Product Scale</th>
                                <th>Product Vendor</th>
                                <th class="none">Product Description</th>
                                <th>In Stock</th>
                                <th>Buy Price</th>
                                <th>MSRP</th>
                                <?php if(isset($_SESSION['employee'])||isset($_SESSION['admin'])){ ?>
                                <th class="all">Actions</th>
                                <th class="check-th all"><input type="checkbox" class="check"
                                        onchange="updateBulkSelection()" id="bulkCheck"></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
foreach ($rs as $product) {
    ?>
                            <script>
                            console.log("<?=$product->getProductCode()?>")
                            </script>
                            <tr>
                                <td><?=$product->getProductCode()?></td>
                                <td><?=$product->getProductName()?></td>
                                <td><?=$product->getProductLine()?></td>
                                <td><?=$product->getProductScale()?></td>
                                <td><?=$product->getProductVendor()?></td>
                                <td><?=$product->getProductDescription()?></td>
                                <td><?=$product->getQuantityInStock()?></td>
                                <td><?=$product->getBuyPrice()?></td>
                                <td><?=$product->getMsrp()?></td>
                                <?php if(isset($_SESSION['employee'])||isset($_SESSION['admin'])){ ?>
                                <td>
                                    <div class="d-flex justify-content-center align-items-center"><a
                                            href="products-api-delete?id=<?=$product->getProductCode()?>">
                                            <div
                                                class="crud-icon crud-icon-delete d-flex justify-content-center align-items-center">
                                                <img width="18px" height="18px" src="img/trashcan.svg">
                                            </div>
                                        </a>
                                        <a href="products-edit?id=<?=$product->getProductCode()?>">
                                            <div
                                                class="crud-icon crud-icon-edit d-flex justify-content-center align-items-center">
                                                <img width="18px" height="18px" src="img/pencil.svg">
                                            </div>
                                        </a>
                                    </div>
                                </td>
                                <td><input name="<?=$product->getProductCode()?>" type="checkbox"
                                        class="check elem-check" onchange="updateSelections()"> </td>
                            </tr>
                            <?php } ?>
                            <?php
}
?>
                        </tbody>
                    </table>
                </form> <a class="btn btn-primary mt-5" href="products-new">New Product</a>
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
        $('#products_table').DataTable({
            responsive: true
        });
        $('#products_table_filter input').get(0).type= "search";
        $('#products_table_filter input').on('input',function(){
            document.getElementById('bulkCheck').checked=false;
            document.getElementById('bulkCheck').indeterminate=false;
            updateBulkSelection();
        });
        <?php if(isset($_SESSION['admin'])||isset($_SESSION['employee'])){?>
        $('#products_table_wrapper>:nth-child(1)>:nth-child(1)').removeClass('col-md-6').addClass('col-md-3');
        $('#products_table_wrapper>:nth-child(1)>:nth-child(2)').before($('<div></div>').addClass(
            'col-sm-12 col-md-3 text-center').prop('id', 'table_bulk').html(
            '<select onchange="if(this.options[this.selectedIndex].value==\'d\')deleteProducts();" class="form-control form-control-sm"><option value="" selected disabled hidden>Bulk Actions</option><option value="d">Delete Selected</option></select>'
            ));
        $('#products_table_wrapper>:nth-child(1)').addClass('align-items-center justify-content-center');
        $('#products_table_wrapper>:nth-child(1) label').addClass('mb-0');
        $('#products_table_wrapper>:nth-child(1)>*').addClass('my-2');
        <?php
        }
        ?>
    });
    </script>
    <?php include "includes/views/components/footer.php";?>
</body>

</html>