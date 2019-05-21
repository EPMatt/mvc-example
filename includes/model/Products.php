<?php
/**
 * Author:      Agnoletto Matteo (EPMatt)
 * Date:        20/05/2019
 * Product Data Access Object Class
 */

require_once "includes/model/Product.php";
require_once "includes/core/dao.php";

class Products extends DataAccessObject {
    /**
     * Constructor with parameters
     * @param DBConnector $conn the connection instance which will be used to interface with the table
     * @param string $tableName the name of the table mapped by this class
     */
    public function __construct(DBConnector $conn, string $tableName) {
        parent::__construct($conn, $tableName, Product::class);
    }
}
?>