<?php
use api\DataBaseConn;
use controller\CondamnariController;
use endpoints\EndpointCondamnari;

include 'endpoints/EndpointCondamnari.php';

// Importă clasele necesare

require_once 'DataBaseConn.php';
require_once 'controller/CondamnariController.php';

// Definește valorile pentru proprietățile clasei Endpoint

$endpoint = new EndpointCondamnari();
$endpoint->sex = 'CondamnariSexe';
$drog = 'canabis';

// Apelează metoda getNumberOfUrgenteByYearAndBoala()

$endpoint->getAllBySexEndpoint();
?>
