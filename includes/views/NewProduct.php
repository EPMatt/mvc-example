<?php
    require_once "includes/core/DBConnector.php";
    $db=new DBConnector('config.ini');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DBOrders! - New Product</title>

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
                <h1>New Product</h1>
            </div>
        </div>
        <?=(isset($_GET['error'])) ? '<div class="alert alert-danger mb-4" role="alert">Error while adding the product</div>' : ((isset($_GET['success'])) ? '<div class="alert alert-success mb-4" role="alert">Product updated successfully!</div>' : "");?>
        <form method="post" id="form-submit" action="products-api-new">
            <div class="row mb-3">
                <div class="col">
                    <h4>Data:</h4>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2 col-md-2">
                    <label for="product-code">Product Code</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" name="product-code" placeholder="S10_0000"
                        oninput='checkDataLength("product-code","product-code-sm",1,15); checkProductCode(null)' id="product-code"
                        >
                    <small id="product-code-sm" class="form-text text-muted form-errors"></small>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="product-line">Product Line</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <select class="form-control" name="product-line" placeholder="Product Line">
                        <?php
                            $rs = $db->execute("SELECT productLine FROM productlines");
                            ?>
                        <?php
                            foreach ($rs as $row) {
                                ?>
                        <option value="<?=$row['productLine'];?>">
                            <?=$row['productLine'];?></option>
                        <?php
                                }
                            ?>
                    </select>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2 col-md-2">
                    <label for="product-name">Product Name</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" name="product-name" placeholder="1969 Ford Mustang"
                        oninput='checkDataLength("product-name","product-name-sm",1,70)' id="product-name">
                    <small id="product-name-sm" class="form-text text-muted form-errors"></small>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="product-scale">Product Scale</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" name="product-scale" placeholder="1:10"
                        oninput='checkDataLength("product-scale","product-scale-sm",1,10)' id="product-scale">
                    <small id="product-scale-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2">
                    <label for="product-vendor">Product Vendor</label>
                </div>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="product-vendor" placeholder="John Smith's Diecast"
                        oninput='checkDataLength("product-vendor","product-vendor-sm",1,50)' id="product-vendor">
                    <small id="product-vendor-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2">
                    <label for="product-description">Product Description</label>
                </div>
                <div class="col-sm-10">
                    <textarea rows="10" class="form-control" name="product-description" placeholder="The product description. Insert information about materials and colors, as well as the product functions. Be concise but detailed."
                        oninput='checkDataLength("product-description","product-description-sm",1,65536)'
                        id="product-description"></textarea>
                    <small id="product-description-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2 col-md-2">
                    <label for="quantity">Quantity In Stock</label>
                </div>
                <div class="col-sm-10 col-md-4">
                    <input type="number" min="0" step="1" class="form-control" name="quantity" placeholder="17"
                        oninput='checkDataLength("quantity","quantity-sm",1,65536)' id="quantity">
                    <small id="quantity-sm" class="form-text text-muted form-errors"></small>
                </div>
                <div class="col-sm-2 col-md-2">
                    <label for="price">Buy Price</label>
                </div>
                <div class="col-sm-10 col-md-4">
                <input type="number" min="0" step="0.1" class="form-control" name="price" placeholder="12,99"
                        oninput='checkDataLength("price","price-sm",1,65536)' id="price">
                    <small id="price-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
            <div class="form-group row align-items-center">
                <div class="col-sm-2">
                    <label for="msrp">MSRP</label>
                </div>
                <div class="col-sm-10">
                <input type="number" min="0" step="0.1" class="form-control" name="msrp" placeholder="27,99"
                        oninput='checkDataLength("msrp","msrp-sm",1,50)' id="msrp">
                    <small id="msrp-sm" class="form-text text-muted form-errors"></small>
                </div>
            </div>
        </form>
        <div class="row mt-5">
            <div class="col-md-6 col-sm-12 mb-4 crud-button-left"><a href="products" class="btn btn-secondary">Go back</a></div>
            <div class="col-md-6 col-sm-12 mb-4 crud-button-right"><button class="btn btn-primary" onclick="newProduct('form-submit');"
                id="submit-button">Add
                product</button></div>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var submitFoo=function(){
            newProduct('form-submit');
        }
    </script>
    <script type="text/javascript" src="js/app.js"></script>
    <?php include "includes/views/components/footer.php";?>
</body>

</html>