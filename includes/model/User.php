<?php
/**
 * Author:      Agnoletto Matteo (EPMatt)
 * Date:        11/02/2019
 * User DO Class
 */

require_once "includes/core/do.php";
class User extends DataObject {
    private $id;
    private $user;
    private $password;
    private $cognome;
    private $nome;
    private $data_nascita;
    private $via;
    private $provincia;
    private $comune;
    private $tipologia;

    /**
     * Construct an instance with the given values
     * @param id user identifier
     * @param user username
     * @param password user password
     * @param cognome user surname
     * @param nome user last name
     * @param data_nascita user birthdate
     * @param via user address
     * @param provincia user province
     * @param comune user city
     */
    public function __construct($id, $user, $password, $cognome, $nome, $data_nascita, $via, $provincia, $comune, $tipologia) {
        $this->id = $id;
        $this->user = $user;
        $this->password = $password;
        $this->cognome = $cognome;
        $this->nome = $nome;
        $this->data_nascita = $data_nascita;
        $this->via = $via;
        $this->provincia = $provincia;
        $this->comune = $comune;
        $this->tipologia = $tipologia;
    }

    /**
     * Get the value of id
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser() {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user) {
        $this->user = $user;
        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password) {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of cognome
     */
    public function getCognome() {
        return $this->cognome;
    }

    /**
     * Set the value of cognome
     *
     * @return  self
     */
    public function setCognome($cognome) {
        $this->cognome = $cognome;
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
     * Get the value of data_nascita
     */
    public function getData_nascita() {
        return $this->data_nascita;
    }

    /**
     * Set the value of data_nascita
     *
     * @return  self
     */
    public function setData_nascita($data_nascita) {
        $this->data_nascita = $data_nascita;
        return $this;
    }

    /**
     * Get the value of via
     */
    public function getVia() {
        return $this->via;
    }

    /**
     * Set the value of via
     *
     * @return  self
     */
    public function setVia($via) {
        $this->via = $via;
        return $this;
    }

    /**
     * Get the value of provincia
     */
    public function getProvincia() {
        return $this->provincia;
    }

    /**
     * Set the value of provincia
     *
     * @return  self
     */
    public function setProvincia($provincia) {
        $this->provincia = $provincia;
        return $this;
    }

    /**
     * Get the value of comune
     */
    public function getComune() {
        return $this->comune;
    }

    /**
     * Set the value of comune
     *
     * @return  self
     */
    public function setComune($comune) {
        $this->comune = $comune;
        return $this;
    }

    /**
     * Get the value of tipologia
     */
    public function getTipologia() {
        return $this->tipologia;
    }

    /**
     * Set the value of tipologia
     *
     * @return  self
     */
    public function setTipologia($tipologia) {
        $this->tipologia = $tipologia;
        return $this;
    }

    /**
     * Get an associative array representing the object
     * @return array the associative array corresponding to the current DataObject instance
     */
    public function getArray() {
        return [
            "id" => $this->getId(),
            "user" => $this->getUser(),
            "password" => $this->getPassword(),
            "cognome" => $this->getCognome(),
            "nome" => $this->getNome(),
            "data_nascita" => $this->getData_nascita(),
            "via" => $this->getVia(),
            "provincia" => $this->getProvincia(),
            "comune" => $this->getComune(),
            "tipologia" => $this->getTipologia()
        ];
    }

    /**
     * Get an associative array containing the primary key of the object
     * @return array the associative array corresponding to the current DataObject instance primary key
     */
    public function getPrimaryKey() {
        return [
            "id" => $this->getId(),
        ];
    }

    /**
     * Get an associative array containing the fields of the object (primary key excluded)
     * @return array the associative array corresponding to the current DataObject instance fields, primary key excluded
     */
    public function getFields() {
        return [
            "user" => $this->getUser(),
            "password" => $this->getPassword(),
            "cognome" => $this->getCognome(),
            "nome" => $this->getNome(),
            "data_nascita" => $this->getData_nascita(),
            "via" => $this->getVia(),
            "provincia" => $this->getProvincia(),
            "comune" => $this->getComune(),
            "tipologia" => $this->getTipologia()
        ];
    }

    /**
     * Construct an instance from a record
     * @param array $fields associative array corresponding to a record in the table
     * @return DataObject $do the Data Object instance corresponding to the given array
     */
    public static function fromArray(array $fields) {
        return new User($fields['id'], $fields['user'], $fields['password'], $fields['cognome'], $fields['nome'], $fields['data_nascita'], $fields['via'], $fields['provincia'], $fields['comune'],$fields['tipologia']);
    }

}
