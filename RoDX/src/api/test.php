<?php
use api\DataBaseConn;
use controller\CapturiController;
use endpoints\EndpointCapturi;

include 'endpoints/EndpointCapturi.php';

// Importă clasele necesare

require_once 'DataBaseConn.php';
require_once 'controller/CapturiController.php';

// Definește valorile pentru proprietățile clasei Endpoint

$endpoint = new EndpointCapturi();
$endpoint->capturiDrog = 'FisierDrog';
$drog = 'canabis';

// Apelează metoda getNumberOfUrgenteByYearAndBoala()

$endpoint->getAllByDrogEndpoint('canabis');
?>
