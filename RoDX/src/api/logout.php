<?php
// conexiunea cu baza de date
include 'DataBaseConn.php';


if(isset($_POST['logout'])){
    header("Location: ../views/index.html");
    exit;
}

pg_close($con);
?>