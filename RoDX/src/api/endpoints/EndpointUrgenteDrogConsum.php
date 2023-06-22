<?php
namespace endpoints;
use PDO;
use PDOException;
use api\DataBaseConn;
use controller\UrgenteDrogConsumController;

header('Content-Type:application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

class EndpointUrgenteDrogDiagnostic{

    public $numberOfUrgenteByYearAndConsum;
    public $numberOfUrgenteByCanabis;
    public $numberOfUrgenteByStimulanti;
    public $numberOfUrgenteByOpiacee;
    public $numberOfUrgenteByNSP;


    public function __construct(){}

    /**
     * Functie ce returneaza numarul de urgente in functie de an.
     * @return void
     */
    public function getNumberOfUrgenteByYearAndConsum(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new UrgenteDrogConsumController($db);
        if(file_exists($this->numberOfUrgenteByYearAndConsum.".php")){
            include($this->numberOfUrgenteByYearAndConsum.".php");
        } else {
            $stmt = $items->getByYearAndConsumUrgenteDrog();
            $itemCount = $stmt->rowCount();
            $consum = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $linie){
                        if($index == 3){
                            $consum[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$linie.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $linie . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $linie.';';

                            }
                            if($index == 2){
                                $concat = $concat . $linie;
                            }
                        }
                        $index++;
                    }
                }
                $consum[] = $concat;
                $handle = fopen($this->numberOfUrgenteByYearAndConsum.".php","w");
                fwrite($handle, json_encode(array($consum)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($consum)) . "\n \n \n ";
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
        $items = new UrgenteDrogConsumController($db);
        if(file_exists($this->numberOfUrgenteByCanabis.".php")){
            include($this->numberOfUrgenteByCanabis.".php");
        } else {
            $stmt = $items->getCauzaCanabisByYear();
            $itemCount = $stmt->rowCount();
            $consum = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $linie){
                        if($index == 3){
                            $consum[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$linie.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $linie . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $linie.';';

                            }
                            if($index == 2){
                                $concat = $concat . $linie;
                            }
                        }
                        $index++;
                    }
                }
                $consum[] = $concat;
                $handle = fopen($this->numberOfUrgenteByCanabis.".php","w");
                fwrite($handle, json_encode(array($consum)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($consum)) . "\n \n \n ";
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
        $items = new UrgenteDrogConsumController($db);
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
                    foreach($row as $linie){
                        if($index == 3){
                            $consum[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$linie.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $linie . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $linie.';';

                            }
                            if($index == 2){
                                $concat = $concat . $linie;
                            }
                        }
                        $index++;
                    }
                }
                $consum[] = $concat;
                $handle = fopen($this->numberOfUrgenteByStimulanti.".php","w");
                fwrite($handle, json_encode(array($consum)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($consum)) . "\n \n \n ";
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
        $items = new UrgenteDrogConsumController($db);
        if(file_exists($this->numberOfUrgenteByOpiacee.".php")){
            include($this->numberOfUrgenteByOpiacee.".php");
        } else {
            $stmt = $items->getCauzaOpiaceeByYear();
            $itemCount = $stmt->rowCount();
            $consum = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $linie){
                        if($index == 3){
                            $consum[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$linie.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $linie . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $linie.';';

                            }
                            if($index == 2){
                                $concat = $concat . $linie;
                            }
                        }
                        $index++;
                    }
                }
                $consum[] = $concat;
                $handle = fopen($this->numberOfUrgenteByOpiacee.".php","w");
                fwrite($handle, json_encode(array($consum)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($consum)) . "\n \n \n ";
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
        $items = new UrgenteDrogConsumController($db);
        if(file_exists($this->numberOfUrgenteByNSP.".php")){
            include($this->numberOfUrgenteByNSP.".php");
        } else {
            $stmt = $items->getCauzaNSPByYear();
            $itemCount = $stmt->rowCount();
            $consum = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $linie){
                        if($index == 3){
                            $consum[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$linie.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $linie . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $linie.';';

                            }
                            if($index == 2){
                                $concat = $concat . $linie;
                            }
                        }
                        $index++;
                    }
                }
                $consum[] = $concat;
                $handle = fopen($this->numberOfUrgenteByNSP.".php","w");
                fwrite($handle, json_encode(array($consum)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($consum)) . "\n \n \n ";
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