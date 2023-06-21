<?php
namespace api;
use PDO;
use PDOException;

class DataBaseConn{
    private string $host = 'hansken.db.elephantsql.com';
    private string $user = 'cyjvryeg';
    private string $pass = 'J5vORyk7ysgEBeHVnEJhD9Hnywf6kfm6';
    private string $db_name = 'cyjvryeg';
    private PDO $dbConnection;
    
    public function __construct() {
        try {
            $this->dbConnection = new PDO('pgsql:host=' . $this->host . ';dbname=' . $this->db_name, $this->user, $this->pass);
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo 'Connection Error: ' . $e->getMessage();
        }
    }
    public function getConnection(): ?PDO {
        return $this->dbConnection;
    }
}
?>