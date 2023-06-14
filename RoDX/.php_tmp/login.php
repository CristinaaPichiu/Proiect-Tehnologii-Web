<?php
// conexiunea cu baza de date
$host = "hansken.db.elephantsql.com";
$user = "cyjvryeg";
$pass = "J5vORyk7ysgEBeHVnEJhD9Hnywf6kfm6";
$db = "cyjvryeg";

$con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("Could not connect to Server\n");
echo "Sunt aici";

$query = "SELECT * FROM users";
$result = pg_query($con, $query);

if (pg_num_rows($result) == 0) {
    echo "Error: Unable to open database\n";
} else {
    if(isset($_POST['login'])){
        if (isset($_POST['username']) && isset($_POST['password'])) {

            $name = $_POST['username'];
            $password = $_POST['password'];

            // Verificarea numelor de utilizator și parolei în baza de date

            $query = "SELECT * FROM register WHERE username='$name' AND password='$password'";
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
    } elseif (isset($_POST['register'])) {
        // Redirecționarea către pagina de înregistrare
        header("Location: ../views/register.html");
        exit();
    }
}

pg_close($con);
?>
