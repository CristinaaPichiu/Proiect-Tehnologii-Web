<?php
use api\DataBaseConn;
use endpoints\EndpointCampanii;
use endpoints\EndpointCondamnari;
use endpoints\EndpointInfractiuni;
use endpoints\EndpointUrgenteDrogDiagnostic;
use endpoints\EndpointUrgenteDrogConsum;
use endpoints\EndpointUrgenteDrogSex;
use endpoints\EndpointUrgenteDrogVarsta;
use endpoints\EndpointCapturi;

include 'endpoints/EndpointCondamnari.php';
include 'endpoints/EndpointCampanii.php';
include 'endpoints/EndpointInfractiuni.php';
include 'endpoints/EndpointUrgenteDrogDiagnostic.php';
include 'endpoints/EndpointUrgenteDrogConsum.php';
include 'endpoints/EndpointUrgenteDrogSex.php';
include 'endpoints/EndpointUrgenteDrogVarsta.php';
include 'endpoints/EndpointCapturi.php';

// Importă clasele necesare
require_once 'DataBaseConn.php';
require_once 'controller/CondamnariController.php';
require_once 'controller/CampaniiController.php';
require_once 'controller/InfractiuniController.php';
require_once 'controller/UrgenteDrogDiagnosticController.php';
require_once 'controller/UrgenteDrogConsumController.php';
require_once 'controller/UrgenteDrogSexController.php';
require_once 'controller/UrgenteDrogVarstaController.php';
require_once 'controller/CapturiController.php';

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
$endpoint4->numberOfUrgenteByCanabis="UrgenteCanabisBoala";
$endpoint4->getNumberOfUrgenteByCanabis();
$endpoint4->numberOfUrgenteByOpiacee="UrgenteOpiaceeBoala";
$endpoint4->getNumberOfUrgenteByOpiacee();
$endpoint4->numberOfUrgenteByNSP="UrgenteNspBoala";
$endpoint4->getNumberOfUrgenteByNSP();
$endpoint4->numberOfUrgenteByStimulanti="UrgenteStimulantiBoala";
$endpoint4->getNumberOfUrgenteByStimulanti();
$endpoint4->numberOfUrgenteByYear="UrgenteByYearBoala";
$endpoint4->getNumberOfUrgenteByYear(2019);
$endpoint4->getNumberOfUrgenteByYear(2020);
$endpoint4->getNumberOfUrgenteByYear(2021);

/*$endpoint5 = new EndpointUrgenteDrogConsum();
$endpoint5->numberOfUrgenteByYearAndConsum ='UrgenteByYearConsum';
$endpoint5->getNumberOfUrgenteByYearAndConsum();
$endpoint5->numberOfUrgenteByCanabis="UrgenteCanabisConsum";
$endpoint5->getNumberOfUrgenteByCanabis();
$endpoint5->numberOfUrgenteByOpiacee="UrgenteOpiaceeConsum";
$endpoint5->getNumberOfUrgenteByOpiacee();
$endpoint5->numberOfUrgenteByNSP="UrgenteNspConsum";
$endpoint5->getNumberOfUrgenteByNSP();
$endpoint5->numberOfUrgenteByStimulanti="UrgenteStimulantiConsum";
$endpoint5->getNumberOfUrgenteByStimulanti();*/

$endpoint6 = new EndpointUrgenteDrogSex();
$endpoint6->numberOfUrgenteByYearAndSex ='UrgenteByYearSex';
$endpoint6->getNumberOfUrgenteByYearAndSex();
$endpoint6->numberOfUrgenteByCanabis="UrgenteCanabisSex";
$endpoint6->getNumberOfUrgenteByCanabis();
$endpoint6->numberOfUrgenteByOpiacee="UrgenteOpiaceeSex";
$endpoint6->getNumberOfUrgenteByOpiacee();
$endpoint6->numberOfUrgenteByNSP="UrgenteNspSex";
$endpoint6->getNumberOfUrgenteByNSP();
$endpoint6->numberOfUrgenteByStimulanti="UrgenteStimulantiSex";
$endpoint6->getNumberOfUrgenteByStimulanti();
$endpoint6->numberOfUrgenteByYear="UrgenteByYearSex";
$endpoint6->getNumberOfUrgenteByYear(2019);
$endpoint6->getNumberOfUrgenteByYear(2020);
$endpoint6->getNumberOfUrgenteByYear(2021);

$endpoint7 = new EndpointUrgenteDrogVarsta();
$endpoint7->numberOfUrgenteByYearAndVarsta ='UrgenteByYearVarsta';
$endpoint7->getNumberOfUrgenteByYearAndVarsta();
$endpoint7->numberOfUrgenteByCanabis="UrgenteCanabisVarsta";
$endpoint7->getNumberOfUrgenteByCanabis();
$endpoint7->numberOfUrgenteByOpiacee="UrgenteOpiaceeVarsta";
$endpoint7->getNumberOfUrgenteByOpiacee();
$endpoint7->numberOfUrgenteByNSP="UrgenteNspVarsta";
$endpoint7->getNumberOfUrgenteByNSP();
$endpoint7->numberOfUrgenteByStimulanti="UrgenteStimulantiVarsta";
$endpoint7->getNumberOfUrgenteByStimulanti();
$endpoint7->numberOfUrgenteByYear="UrgenteByYearVarsta";
$endpoint7->getNumberOfUrgenteByYear(2019);
$endpoint7->getNumberOfUrgenteByYear(2020);
$endpoint7->getNumberOfUrgenteByYear(2021);

$endpoint8 = new EndpointCapturi;
$endpoint8->capturiGrame = 'CapturiGrameDrog';
$endpoint8->getAllByCapturiGrameEndpoint();
?>
