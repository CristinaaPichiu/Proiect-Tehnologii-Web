<?php
// conexiunea cu baza de date
include 'DataBaseConn.php';

$query = "SELECT * FROM users";
$result = pg_query($con, $query);

if(isset($_POST['login'])){
    if (pg_num_rows($result) == 0) {
        echo "Error: Unable to open database\n";
    } else {
        if (isset($_POST['username']) && isset($_POST['password'])) {

            $name = $_POST['username'];
            $password = $_POST['password'];

            // Verificarea numelor de utilizator și parolei în baza de date

            $query = "SELECT * FROM users WHERE email='$name' AND password='$password'";
            $result = pg_query($con, $query);

            if (pg_num_rows($result) !== 0) {
                // Numele de utilizator și parola sunt valide

                // Redirecționarea către pagina de statistici
                header("Location: ../views/statistici.html");
                exit();
            } else {
                echo "Error: Invalid username or password\n";
            }
        }
    }
} elseif (isset($_POST['register'])) {
        // Redirecționarea către pagina de înregistrare
    header("Location: ../views/register.html");
    exit();
}


pg_close($con);
?>
