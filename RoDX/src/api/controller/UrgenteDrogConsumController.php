<?php
namespace controller;

class UrgenteDrogConsumController {
    private $conn;

    /**
     * DataBase table
     */
    private string $db_table="urgente_drog_consum";

    /**
     * DataBase columns
     */
    public $consum;
    public $canabis;
    public $stimulenti;
    public $opiacee;
    public $nsp;
    public $an;

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

    public function getByYearAndConsumUrgenteDrog()
    {
        $sqlQuery = sprintf("SELECT s.an, s.consum, (s.canabis + s.stimulanti + s.opiacee + s.nsp) as droguri FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getCauzaCanabisByYear()
    {
        $sqlQuery = sprintf("SELECT an, cauza, canabis FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getCauzaStimulantiByYear()
    {
        $sqlQuery = sprintf("SELECT an, cauza, stimulanti FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getCauzaOpiaceeByYear()
    {
        $sqlQuery = sprintf("SELECT an, cauza, opiacee FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getCauzaNSPByYear()
    {
        $sqlQuery = sprintf("SELECT an, cauza, nsp FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getAllByYear()
    {
        $sqlQuery = sprintf("SELECT * FROM %s WHERE an=?", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->an);
        $stmt->execute();
        return $stmt;
    }

}

?>