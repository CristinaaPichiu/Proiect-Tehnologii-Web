<?php
namespace controller;

class UrgenteDrogAdministrareController {
    private $conn;

    /**
     * DataBase table
     */
    private string $db_table="urgente_drog_varsta";

    /**
     * DataBase columns
     */
    public $varsta;
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

    public function getByYearAndVarstaUrgenteDrog()
    {
        $sqlQuery = sprintf("SELECT s.an, s.varsta, (s.canabis + s.stimulanti + s.opiacee + s.nsp) as droguri FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getVarstaCanabisByYear()
    {
        $sqlQuery = sprintf("SELECT an, varsta, canabis FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getVarstaStimulantiByYear()
    {
        $sqlQuery = sprintf("SELECT an, varsta, stimulanti FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getVarstaOpiaceeByYear()
    {
        $sqlQuery = sprintf("SELECT an, varsta, opiacee FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getVarstaNSPByYear()
    {
        $sqlQuery = sprintf("SELECT an, varsta, nsp FROM %s s order by an", $this->db_table);
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