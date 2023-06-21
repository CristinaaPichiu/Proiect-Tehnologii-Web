<?php
// conexiunea cu baza de date
include 'DataBaseConn.php';
use api\DataBaseConn;

$dbConnectionObj = new DataBaseConn();
$dbConnection = $dbConnectionObj->getConnection();

if(isset($_POST['register'])){
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        $result = $dbConnection->prepare($query);
        $result->execute();
        if ($result) {
            header("Location: ../views/index.html");
            exit(); 
        } else {
            echo "Error: Unable to insert data into the database\n";
        }
    }
}

?>