<?php
    $host = "hansken.db.elephantsql.com";
    $user = "cyjvryeg";
    $pass = "J5vORyk7ysgEBeHVnEJhD9Hnywf6kfm6";
    $db = "cyjvryeg";
    
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass") or die("Could not connect to Server\n");
?>