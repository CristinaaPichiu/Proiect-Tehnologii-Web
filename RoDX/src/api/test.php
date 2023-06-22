<?php
use api\DataBaseConn;
use controller\CondamnariController;
use endpoints\EndpointCampanii;
use endpoints\EndpointCondamnari;
use endpoints\EndpointInfractiuni;
use endpoints\EndpointUrgenteDrogDiagnostic;

include 'endpoints/EndpointCondamnari.php';
include 'endpoints/EndpointCampanii.php';
include 'endpoints/EndpointInfractiuni.php';
include 'endpoints/EndpointUrgenteDrogDiagnostic.php';

// Importă clasele necesare

require_once 'DataBaseConn.php';
require_once 'controller/CondamnariController.php';
require_once 'controller/CampaniiController.php';
require_once 'controller/InfractiuniController.php';
require_once 'controller/UrgenteDrogDiagnosticController.php';


// Fisierul de condamnari organizat pe sexe

$endpoint = new EndpointCondamnari();
$endpoint->sex = 'CondamnariSexe';
$endpoint->getAllBySexEndpoint();

// Fisierul unde se scriu campaniile si numarul de beneficiari

$endpoint2 = new EndpointCampanii();
$endpoint2->campanie= 'NumarBeneficiariCampanie';
$endpoint2->getBeneficiariCampanii();


// Fisierul unde se scriu infractiuniile depistate:
$endpoint3 = new EndpointInfractiuni();
$endpoint3->infractiune= 'NrPersoaneInfractiuni';
$endpoint3->getAllInfractiuniEndpoint();

// Fisierul unde se prezinta pe ani nr de droguri consumate
$endpoint4 = new EndpointUrgenteDrogDiagnostic();
$endpoint4->numberOfUrgenteByYearAndBoala ='UrgenteByYearBoala';
$endpoint4->getNumberOfUrgenteByYearAndBoala();
?>
