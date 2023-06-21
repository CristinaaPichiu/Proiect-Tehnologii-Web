<?php
namespace endpoints;
use PDO;
use PDOException;
use api\DataBaseConn;
use controller\UrgenteDrogDiagnosticController;

header('Content-Type:application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

class EndpointUrgenteDrogDiagnostic{

    public $numberOfUrgenteByYearAndBoala;
    public $numberOfUrgenteByCanabis;
    public $numberOfUrgenteByStimulanti;
    public $numberOfUrgenteByOpiacee;
    public $numberOfUrgenteByNSP;


    public function __construct(){}

    /**
     * Functie ce returneaza numarul de urgente in functie de an.
     * @return void
     */
    public function getNumberOfUrgenteByYearAndBoala(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new UrgenteDrogDiagnosticController($db);
        if(file_exists($this->numberOfUrgenteByYearAndBoala.".php")){
            include($this->numberOfUrgenteByYearAndBoala.".php");
        } else {
            $stmt = $items->getByYearAndBoalaUrgenteDrog();
            $itemCount = $stmt->rowCount();
            $boli = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $boala){
                        if($index == 3){
                            $boli[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$boala.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $boala . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $boala.';';

                            }
                            if($index == 2){
                                $concat = $concat . $boala;
                            }
                        }
                        $index++;
                    }
                }
                $boli[] = $concat;
                $handle = fopen($this->numberOfUrgenteByYearAndBoala.".php","w");
                fwrite($handle, json_encode(array($boli)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($boli)) . "\n \n \n ";
            }
            else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No record found.")
                );
            }
        }
    }

    public function getNumberOfUrgenteByCanabis(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new UrgenteDrogDiagnosticController($db);
        if(file_exists($this->numberOfUrgenteByCanabis.".php")){
            include($this->numberOfUrgenteByCanabis.".php");
        } else {
            $stmt = $items->getCauzaCanabisByYear();
            $itemCount = $stmt->rowCount();
            $boli = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $boala){
                        if($index == 3){
                            $boli[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$boala.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $boala . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $boala.';';

                            }
                            if($index == 2){
                                $concat = $concat . $boala;
                            }
                        }
                        $index++;
                    }
                }
                $boli[] = $concat;
                $handle = fopen($this->numberOfUrgenteByCanabis.".php","w");
                fwrite($handle, json_encode(array($boli)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($boli)) . "\n \n \n ";
            }
            else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No record found.")
                );
            }
        }
    }


    public function getNumberOfUrgenteByStimulanti(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new UrgenteDrogDiagnosticController($db);
        if(file_exists($this->numberOfUrgenteByStimulanti.".php")){
            include($this->numberOfUrgenteByStimulanti.".php");
        } else {
            $stmt = $items->getCauzaStimulantiByYear();
            $itemCount = $stmt->rowCount();
            $boli = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $boala){
                        if($index == 3){
                            $boli[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$boala.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $boala . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $boala.';';

                            }
                            if($index == 2){
                                $concat = $concat . $boala;
                            }
                        }
                        $index++;
                    }
                }
                $boli[] = $concat;
                $handle = fopen($this->numberOfUrgenteByStimulanti.".php","w");
                fwrite($handle, json_encode(array($boli)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($boli)) . "\n \n \n ";
            }
            else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No record found.")
                );
            }
        }
    }

    public function getNumberOfUrgenteByOpiacee(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new UrgenteDrogDiagnosticController($db);
        if(file_exists($this->numberOfUrgenteByOpiacee.".php")){
            include($this->numberOfUrgenteByOpiacee.".php");
        } else {
            $stmt = $items->getCauzaOpiaceeByYear();
            $itemCount = $stmt->rowCount();
            $boli = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $boala){
                        if($index == 3){
                            $boli[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$boala.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $boala . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $boala.';';

                            }
                            if($index == 2){
                                $concat = $concat . $boala;
                            }
                        }
                        $index++;
                    }
                }
                $boli[] = $concat;
                $handle = fopen($this->numberOfUrgenteByOpiacee.".php","w");
                fwrite($handle, json_encode(array($boli)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($boli)) . "\n \n \n ";
            }
            else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No record found.")
                );
            }
        }
    }

    public function getNumberOfUrgenteByNSP(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new UrgenteDrogDiagnosticController($db);
        if(file_exists($this->numberOfUrgenteByNSP.".php")){
            include($this->numberOfUrgenteByNSP.".php");
        } else {
            $stmt = $items->getCauzaNSPByYear();
            $itemCount = $stmt->rowCount();
            $boli = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $boala){
                        if($index == 3){
                            $boli[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$boala.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $boala . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $boala.';';

                            }
                            if($index == 2){
                                $concat = $concat . $boala;
                            }
                        }
                        $index++;
                    }
                }
                $boli[] = $concat;
                $handle = fopen($this->numberOfUrgenteByNSP.".php","w");
                fwrite($handle, json_encode(array($boli)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($boli)) . "\n \n \n ";
            }
            else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No record found.")
                );
            }
        }
    }

    


  
}

?>