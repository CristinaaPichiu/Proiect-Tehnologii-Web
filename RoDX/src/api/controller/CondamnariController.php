<?php
namespace controller;

class CondamnariController{
    private $conn;
    private string $db_table="condamnari";

    public $barbati;
    public $baieti;
    public $femei;
    public $fete;

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

    public function getByVarstaFemei(){
        $sqlQuery = sprintf("SELECT femei_majore, femei_minore FROM %s", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getByVarstaBarbati(){
        $sqlQuery = sprintf("SELECT barbati_majori, barbati_minori FROM %s", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getByVarstaMajori(){
        $sqlQuery = sprintf("SELECT femei_majore, barbati_majori FROM %s", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getByVarstaMinori(){
        $sqlQuery = sprintf("SELECT femei_minore, barbati_minori FROM %s", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getAllBySex(){
        $sqlQuery = sprintf("SELECT (femei_minore+femei_majore) as femei, (barbati_majori + barbati_majori) as barbati FROM %s", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getAllByVarsta(){
        $sqlQuery = sprintf("SELECT (femei_minore+barbati_minori) as minori, (femei_majore + barbati_majori) as majori FROM %s", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    
}

?>