<?php
namespace controller;

class CampaniiController{
    private $conn;
    private string $db_table="campanii";

    public $campanie;
    public $nr_beneficiari;

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

    public function getNrBeneficiari(){
        $sqlQuery = sprintf("SELECT campanie, nr_beneficiari FROM %s s" , $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}
?>