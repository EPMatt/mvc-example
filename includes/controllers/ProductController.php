<?php
/**
 * The Product Controller class
 * The controller for the products
 */
require_once "includes/model/Products.php";
class ProductController extends Controller {
    protected $products;
    public function __construct() {
        $this->products = new Products(new DBConnector("includes/core/config.ini"), "products");
    }

    public function showView() {
            $rs = $this->products->selectByFilter([]);
            require_once "includes/views/ProductsList.php";
    }

    public function showEditView() {
            $product = $this->products->selectByFilter(["productCode" => $_GET['id']])[0];
            require_once "includes/views/EditProduct.php";
    }

    public function updateProduct() {
            //get from post array
            $productCode = $_POST['product-code'];
            $productName = $_POST['product-name'];
            $productLine = $_POST['product-line'];
            $productScale = $_POST['product-scale'];
            $productVendor = $_POST['product-vendor'];
            $productDescription = $_POST['product-description'];
            $quantityInStock = $_POST['quantity'];
            $buyPrice = $_POST['price'];
            $msrp = $_POST['msrp'];
            //check data
            $safe_data = true;
            //insert
            if ($safe_data) {
                $product = new Product($productCode, $productName, $productLine, $productScale, $productVendor, $productDescription, $quantityInStock, $buyPrice, $msrp);
                if ($this->products->update($product)) {
                    header("Location: products-edit?id=$productCode&success");
                } else {
                    header("Location: products-edit?id=$_GET[id]&error");
                }
            } else {
                header("Location: products-edit?id=$_GET[id]&error");
            }
    }

    public function deleteProducts() {
            $count = 0;
            foreach ($_POST as $key => $value) {
                $id = $key;
                if ($this->products->delete($this->products->selectByFilter(["productCode" => $id])[0])) {
                    $count++;
                }

            }
            $total = count($_POST);
            if ($count === $total) {
                header("Location: products?delete-bulk-success&c=$count&t=$total");
            } else {
                header("Location: products?delete-bulk-error&c=$count&t=$total");
            }
            print_r($_POST);
    }

    public function deleteProduct() {
            $id = $_GET['id'];
            if ($this->products->delete($this->products->selectByFilter(["productCode" => $id])[0])) {
                header("Location: products?id=$id&delete-success");
            } else {
                header("Location: products?id=$id&delete-error");
            }
    }

    public function showNewView() {
            require_once "includes/views/NewProduct.php";
    }

    public function newProduct() {
            //get from post array
            $productCode = $_POST['product-code'];
            $productName = $_POST['product-name'];
            $productLine = $_POST['product-line'];
            $productScale = $_POST['product-scale'];
            $productVendor = $_POST['product-vendor'];
            $productDescription = $_POST['product-description'];
            $quantityInStock = $_POST['quantity'];
            $buyPrice = $_POST['price'];
            $msrp = $_POST['msrp'];
            //check data
            $safe_data = true;
            //insert
            if ($safe_data) {
                $product = new Product($productCode, $productName, $productLine, $productScale, $productVendor, $productDescription, $quantityInStock, $buyPrice, $msrp);
                if ($this->products->insert($product)) {
                    header("Location: products?id=$productCode&new-success");
                } else {
                    header("Location: products-new?id=$productCode&error");
                }
            } else {
                header("Location: products-new?id=$productCode&error");
            }
    }

    public function checkProductCode() {
        $pid = $_POST['pid'];
        if (count($this->products->selectByFilter(["productCode" => $pid])) === 1) {
            echo 0;
        } else {
            echo 1;
        }
    }
}