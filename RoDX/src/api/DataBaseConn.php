<?php
    $host = "dumbo.db.elephantsql.com";
    $user = "ifyxdeeh";
    $pass = "2ztEW94Zan3R-EGWlW90JiR0WZsDlndx";
    $db = "ifyxdeeh";
   
    // Open a PostgreSQL connection
    $con = pg_connect("host=$host dbname=$db user=$user password=$pass")
      or die ("Could not connect to server\n");
    if(!$con) {
      echo "Error : Unable to open database\n";
    }
    else {
      echo "Opened database successfully\n";
    }
?>