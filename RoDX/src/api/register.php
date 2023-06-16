<?php
// conexiunea cu baza de date
include 'DataBaseConn.php';

if(isset($_POST['register'])){
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        $result = pg_query($con, $query);
        if ($result) {
            header("Location: ../views/index.html");
            exit(); 
        } else {
            echo "Error: Unable to insert data into the database\n";
        }
    }
}
pg_close($con);
?>