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
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByYearAndBoala.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByYearAndBoala.".json");
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
                                $concat=$concat.$boala.' ';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $boala . ' ';

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
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByYearAndBoala.".json","w");
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
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByCanabis.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByCanabis.".json");
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
                                $concat=$concat.$boala.' ';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $boala . ' ';

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
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByCanabis.".json","w");
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
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByStimulanti.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByStimulanti.".json");
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
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByStimulanti.".json","w");
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
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByOpiacee.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByOpiacee.".json");
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
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByOpiacee.".json","w");
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
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByNSP.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByNSP.".json");
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
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByNSP.".json","w");
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