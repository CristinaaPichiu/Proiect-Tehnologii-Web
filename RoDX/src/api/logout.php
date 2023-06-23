<?php
// conexiunea cu baza de date
include 'DataBaseConn.php';
use api\DataBaseConn;

$dbConnectionObj = new DataBaseConn();
$dbConnection = $dbConnectionObj->getConnection();


if(isset($_POST['logout'])){
    $loggedIn1=0;
    $loggedIn2=1;
    $query = "UPDATE users2 SET logged_in = :loggedIn1 WHERE logged_in= :loggedIn2";
    $stmt = $dbConnection->prepare($query);
    $stmt->bindParam(':loggedIn1', $loggedIn1);
    $stmt->bindParam(':loggedIn2', $loggedIn2);
    $stmt->execute();
   
    header("Location: ../views/index.html");
    exit();
}

?>