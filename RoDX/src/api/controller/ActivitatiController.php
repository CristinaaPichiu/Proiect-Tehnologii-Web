<?php
namespace controller;

class ActivitatiController{
    private $conn;
    private string $db_table="activitati";

    public $activitati;
    public $nr_activitati;
    public $nr_copii;
    public $nr_parinti;
    public $nr_didactice;

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

    public function getAllByActivitati($activitati){
        $activ="'%".$activitati."%'";
        $sqlQuery=sprintf("SELECT s FROM %s s WHERE activitati LIKE %s",$this->db_table,$activ);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
}
?>