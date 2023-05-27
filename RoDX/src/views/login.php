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
    if (isset($_POST['username']) && isset($_POST['password'])) {

        $name = $_POST['username'];
        $password = $_POST['password'];

        $query = "INSERT INTO register (username, password) VALUES ('$name', '$password')";
        $result = pg_query($con, $query);
        if ($result) {
           echo "lala";
            exit(); 
        } else {
            echo "Error: Unable to insert data into the database\n";
        }
        echo "sunt in if";
    }
}
pg_close($con);
?>