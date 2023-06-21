<?php
namespace controller;

class UrgenteDrogSexController {
    private $conn;

    /**
     * DataBase table
     */
    private string $db_table="urgente_drog_sex";

    /**
     * DataBase columns
     */
    public $sex;
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

    public function getByYearAndSexUrgenteDrog()
    {
        $sqlQuery = sprintf("SELECT s.an, s.sex, (s.canabis + s.stimulanti + s.opiacee + s.nsp) as droguri FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getSexCanabisByYear()
    {
        $sqlQuery = sprintf("SELECT an, sex, canabis FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getSexStimulantiByYear()
    {
        $sqlQuery = sprintf("SELECT an, sex, stimulanti FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getSexOpiaceeByYear()
    {
        $sqlQuery = sprintf("SELECT an, sex, opiacee FROM %s s order by an", $this->db_table);
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }

    public function getSexNSPByYear()
    {
        $sqlQuery = sprintf("SELECT an, sex, nsp FROM %s s order by an", $this->db_table);
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