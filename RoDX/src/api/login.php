<?php
// conexiunea cu baza de date
include 'DataBaseConn.php';

$query = "SELECT * FROM users";
$result = pg_query($con, $query);

if(isset($_POST['login'])){
    if (pg_num_rows($result) == 0) {
        echo "Error: Unable to open database\n";
    } else {
        if (isset($_POST['name']) && isset($_POST['password'])) {
        
            $name = $_POST['name'];
            $password = $_POST['password'];

            // Verificarea numelor de utilizator și parolei în baza de date

            $query = "SELECT * FROM users WHERE email='$name' AND password='$password'";
            $result = pg_query($con, $query);

            if (pg_num_rows($result) != 0) {
                header("Location: ../views/index.html");
                exit();
            } else {
                echo "Error: Invalid username or password\n";
            }
        }
    }
} 


pg_close($con);
?>
