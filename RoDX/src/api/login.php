<?php
include 'DataBaseConn.php';
use api\DataBaseConn;

$dbConnectionObj = new DataBaseConn();
$dbConnection = $dbConnectionObj->getConnection();

$query = "SELECT * FROM users";
$result = $dbConnection->query($query);

if(isset($_POST['login'])){
    if ($result->rowCount() == 0) {
        echo "Error: Unable to open database\n";
    } else {
        if (isset($_POST['name']) && isset($_POST['password'])) {
        
            $name = $_POST['name'];
            $password = $_POST['password'];

            // Verificarea numelor de utilizator și parolei în baza de date

            $query = "SELECT * FROM users WHERE email=:name AND password=:password";
            $stmt = $dbConnection->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            if ($stmt->rowCount() != 0) {
                header("Location: ../views/index.html");
                exit();
            } else {
                echo "Error: Invalid username or password\n";
            }
        }
    }
} 

$dbConnection = null;
?>
