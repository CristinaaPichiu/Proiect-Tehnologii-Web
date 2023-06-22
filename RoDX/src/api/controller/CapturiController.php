<?php
namespace controller;

class CapturiController{
    private $conn;
    private string $db_table="capturi";

    public $drog;
    public $grame;
    public $comprimate;
    public $doze;
    public $mililitri;
    public $nr_capturi;

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

    public function getAllCapturiGrame(){
        $sqlQuery = sprintf("SELECT drog, grame, nr_capturi from %s where grame is not null", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getAllByDrog($drog){
        $drogType="'%".$drog."%'";
        $sqlQuery=sprintf("SELECT s FROM %s s WHERE drog LIKE %s",$this->db_table,$drogType);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

}
?>