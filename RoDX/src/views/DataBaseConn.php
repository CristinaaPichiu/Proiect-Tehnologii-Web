<?php
    $host = "hansken.db.elephantsql.com";
    $user = "cyjvryeg";
    $pass = "J5vORyk7ysgEBeHVnEJhD9Hnywf6kfm6";
    $db = "cyjvryeg";

    // Open a PostgreSQL connection
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
        or die ("Could not connect to server\n");

    // Query to check if user exists with the given username and password
    $query = "SELECT * FROM users";
    $result = pg_query($con, $query);

    if (pg_num_rows($result) > 0) {
        // User authentication successful
       echo "Baza de date a fost conectata.";
    }
?>