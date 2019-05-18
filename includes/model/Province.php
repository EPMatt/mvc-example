<?php
/**
 * Author:      Agnoletto Matteo (EPMatt)
 * Date:        11/02/2019
 * Province DO Class
 */

require_once "includes/core/do.php";
class Province extends DataObject {
    private $sigla;
    private $nome;

    /**
     * Construct an instance with the given values
     * @param sigla user identifier
     * @param nome username
     */
    public function __construct($sigla, $nome) {
        $this->sigla = $sigla;
        $this->nome = $nome;
    }

    /**
     * Get the value of sigla
     */
    public function getSigla() {
        return $this->sigla;
    }

    /**
     * Set the value of sigla
     *
     * @return  self
     */
    public function setSigla($sigla) {
        $this->sigla = $sigla;
        return $this;
    }

    /**
     * Get the value of nome
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */
    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    /**
     * Get an associative array representing the object
     * @return array the associative array corresponding to the current DataObject instance
     */
    public function getArray() {
        return [
            "sigla" => $this->getSigla(),
            "nome" => $this->getNome(),
        ];
    }

    /**
     * Get an associative array containing the primary key of the object
     * @return array the associative array corresponding to the current DataObject instance primary key
     */
    public function getPrimaryKey() {
        return [
            "sigla" => $this->getSigla(),
        ];
    }

    /**
     * Get an associative array containing the fields of the object (primary key excluded)
     * @return array the associative array corresponding to the current DataObject instance fields, primary key excluded
     */
    public function getFields() {
        return [
            "nome" => $this->getNome(),
        ];
    }

    /**
     * Construct an instance from a record
     * @param array $fields associative array corresponding to a record in the table
     * @return DataObject $do the Data Object instance corresponding to the given array
     */
    public static function fromArray(array $fields) {
        return new Province($fields['sigla'], $fields['nome']);
    }

}
?>