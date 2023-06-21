<?php
// conexiunea cu baza de date
include 'DataBaseConn.php';
use api\DataBaseConn;


if(isset($_POST['logout'])){
    header("Location: ../views/index.html");
    exit;
}


?>