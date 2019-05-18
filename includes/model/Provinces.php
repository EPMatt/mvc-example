<?php
/**
 * Author:      Agnoletto Matteo (EPMatt)
 * Date:        11/02/2019
 * Province Data Access Object Class
 */

require_once "includes/model/Province.php";
require_once "includes/core/dao.php";

class Provinces extends DataAccessObject {
    /**
     * Constructor with parameters
     * @param DBConnector $conn the connection instance which will be used to interface with the table
     * @param string $tableName the name of the table mapped by this class
     */
    public function __construct(DBConnector $conn, string $tableName) {
        parent::__construct($conn, $tableName, Province::class);
    }
}
?>