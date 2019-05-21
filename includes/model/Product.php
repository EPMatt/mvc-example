<?php
/**
 * Author:      Agnoletto Matteo (EPMatt)
 * Date:        20/05/2019
 * Product DO Class
 */

require_once "includes/core/do.php";
class Product extends DataObject {
    private $productCode;
    private $productName;
    private $productLine;
    private $productScale;
    private $productVendor;
    private $productDescription;
    private $quantityInStock;
    private $buyPrice;
    private $msrp;

    /**
     * Construct an instance with the given values
     * @param productCode product identifier
     * @param productName product name
     * @param productLine product line
     * @param productScale product scale (e.g. 1:10)
     * @param productVendor product vendor
     * @param productDescription product description
     * @param quantityInStock product quantity in stock
     * @param buyPrice product buy price
     * @param msrp Manufacturer's Suggested Retail Price 
     */
    public function __construct($productCode, $productName, $productLine, $productScale, $productVendor, $productDescription, $quantityInStock, $buyPrice, $msrp) {
        $this->productCode = $productCode;
        $this->productName = $productName;
        $this->productLine = $productLine;
        $this->productScale = $productScale;
        $this->productVendor = $productVendor;
        $this->productDescription = $productDescription;
        $this->quantityInStock = $quantityInStock;
        $this->buyPrice = $buyPrice;
        $this->msrp = $msrp;
    }

    /**
     * Get the value of productCode
     */
    public function getProductCode() {
        return $this->productCode;
    }

    /**
     * Set the value of productCode
     *
     * @return  self
     */
    public function setProductCode($productCode) {
        $this->productCode  = $productCode;
        return $this;
    }

    /**
     * Get the value of productLine
     */
    public function getProductLine() {
        return $this->productLine;
    }

    /**
     * Set the value of productLine
     *
     * @return  self
     */
    public function setProductLine($productLine) {
        $this->productLine = $productLine;
        return $this;
    }

    /**
     * Get the value of productScale
     */
    public function getProductScale() {
        return $this->productScale;
    }

    /**
     * Set the value of productScale
     *
     * @return  self
     */
    public function setProductScale($productScale) {
        $this->productScale  = $productScale;
        return $this;
    }

    /**
     * Get the value of productName
     */
    public function getProductName() {
        return $this->productName;
    }

    /**
     * Set the value of productName
     *
     * @return  self
     */
    public function setProductName($productName) {
        $this->productName  = $productName;
        return $this;
    }

    /**
     * Get the value of productVendor
     */
    public function getProductVendor() {
        return $this->productVendor;
    }

    /**
     * Set the value of productVendor
     *
     * @return  self
     */
    public function setProductVendor($productVendor) {
        $this->productVendor  = $productVendor;
        return $this;
    }

    /**
     * Get the value of productDescription
     */
    public function getProductDescription() {
        return $this->productDescription;
    }

    /**
     * Set the value of productDescription
     *
     * @return  self
     */
    public function setProductDescription($productDescription) {
        $this->productDescription  = $productDescription;
        return $this;
    }

    /**
     * Get the value of quantityInStock
     */
    public function getQuantityInStock() {
        return $this->quantityInStock;
    }

    /**
     * Set the value of quantityInStock
     *
     * @return  self
     */
    public function setQuantityInStock($quantityInStock) {
        $this->quantityInStock  = $quantityInStock;
        return $this;
    }

    /**
     * Get the value of buyPrice
     */
    public function getBuyPrice() {
        return $this->buyPrice;
    }

    /**
     * Set the value of buyPrice
     *
     * @return  self
     */
    public function setBuyPrice($buyPrice) {
        $this->buyPrice  = $buyPrice;
        return $this;
    }
    
    /**
     * Get the value of msrp
     */
    public function getMsrp() {
        return $this->msrp;
    }

    /**
     * Set the value of msrp
     *
     * @return  self
     */
    public function setMsrp($msrp) {
        $this->msrp  = $msrp;
        return $this;
    }


    /**
     * Get an associative array representing the object
     * @return array the associative array corresponding to the current DataObject instance
     */
    public function getArray() {
        return [
            "productCode" => $this->getProductCode(),
            "productName" => $this->getProductName(),
            "productLine" => $this->getProductLine(),
            "productScale" => $this->getProductScale(),
            "productVendor" => $this->getProductVendor(),
            "productDescription" => $this->getProductDescription(),
            "quantityInStock" => $this->getQuantityInStock(),
            "buyPrice" => $this->getBuyPrice(),
            "MSRP" => $this->getMsrp(),
        ];
    }

    /**
     * Get an associative array containing the primary key of the object
     * @return array the associative array corresponding to the current DataObject instance primary key
     */
    public function getPrimaryKey() {
        return [
            "productCode" => $this->getProductCode()
        ];
    }

    /**
     * Get an associative array containing the fields of the object (primary key excluded)
     * @return array the associative array corresponding to the current DataObject instance fields, primary key excluded
     */
    public function getFields() {
        return [
            "productName" => $this->getProductName(),
            "productLine" => $this->getProductLine(),
            "productScale" => $this->getProductScale(),
            "productVendor" => $this->getProductVendor(),
            "productDescription" => $this->getProductDescription(),
            "quantityInStock" => $this->getQuantityInStock(),
            "buyPrice" => $this->getBuyPrice(),
            "MSRP" => $this->getMsrp(),
        ];
    }

    /**
     * Construct an instance from a record
     * @param array $fields associative array corresponding to a record in the table
     * @return DataObject $do the Data Object instance corresponding to the given array
     */
    public static function fromArray(array $fields) {
        return new Product($fields['productCode'], $fields['productName'], $fields['productLine'], $fields['productScale'], $fields['productVendor'], $fields['productDescription'], $fields['quantityInStock'], $fields['buyPrice'], $fields['MSRP']);
    }

}
