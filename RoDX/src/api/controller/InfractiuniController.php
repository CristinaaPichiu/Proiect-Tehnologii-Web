<?php
namespace controller;

class InfractiuniController{
    private $conn;
    private string $db_table="infractiuni";

    public $grupari_identificate;
    public $nr_persoane_implicate;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function setConn($conn): void
    {
        $this->conn = $conn;
    }

    public function getDbTable(): string
    {
        return $this->db_table;
    }

    public function setDbTable(string $db_table): void
    {
        $this->db_table = $db_table;
    }

    public function getAllInfractiuni(){
        $sqlQuery = sprintf("SELECT grupari_identificate, nr_persoane_implicate  FROM %s s" , $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}
?>