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

class EndpointUrgenteDrogConsum{

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
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByYearAndConsum.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByYearAndConsum.".json");
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
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByYearAndConsum.".json","w");
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
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByCanabis.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByCanabis.".json");
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
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByCanabis.".json","w");
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
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByStimulanti.".json","w");
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
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByOpiacee.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByOpiacee.".json");
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
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByOpiacee.".json","w");
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
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByNSP.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByNSP.".json");
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
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByNSP.".json","w");
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