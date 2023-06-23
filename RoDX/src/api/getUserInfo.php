<?php
include 'DataBaseConn.php';
use api\DataBaseConn;

$dbConnectionObj = new DataBaseConn();
$dbConnection = $dbConnectionObj->getConnection();

// Obțineți informațiile utilizatorului din baza de date
$query = "SELECT name, email, password FROM users2 WHERE logged_in = 1";
$stmt = $dbConnection->prepare($query);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Returnați informațiile utilizatorului în format JSON
header('Content-Type: application/json');
echo json_encode($user);
?>