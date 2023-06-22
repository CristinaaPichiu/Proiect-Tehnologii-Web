<?php
use api\DataBaseConn;
use controller\ActivitatiControllerController;
use endpoints\EndpointActivitati;

include 'endpoints/EndpointActivitati.php';

// Importă clasele necesare

require_once 'DataBaseConn.php';
require_once 'controller/ActivitatiController.php';

// Definește valorile pentru proprietățile clasei Endpoint

$endpoint = new EndpointActivitati();
$endpoint->activitate = 'Fisier';
$drog = 'canabis';

// Apelează metoda getNumberOfUrgenteByYearAndBoala()

$endpoint->getAllByActivitateEndpoint('in mediul prescolar');
?>
