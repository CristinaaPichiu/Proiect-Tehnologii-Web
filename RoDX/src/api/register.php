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
        $loggedIn = 0;

        $query = "INSERT INTO users2 (name, email, password, logged_in) VALUES ('$name', '$email', '$password','$loggedIn')";
        $result = $dbConnection->prepare($query);
        $result->execute();
        if ($result) {
            echo "<script>
                    alert('Autentificarea a fost efectuată cu succes!');
                    window.location.href = '../views/register.html';
                  </script>";
            exit();
        } else {
            echo "Error: Unable to insert data into the database\n";
        }
    }
}

?>