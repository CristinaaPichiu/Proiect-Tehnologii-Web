<?php
namespace endpoints;
use PDO;
use PDOException;
use api\DataBaseConn;
use controller\UrgenteDrogVarstaController;

header('Content-Type:application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

class EndpointUrgenteDrogVarsta{
    public $numberOfUrgenteByYear;
    public $numberOfUrgenteByYearAndVarsta;
    public $numberOfUrgenteByCanabis;
    public $numberOfUrgenteByStimulanti;
    public $numberOfUrgenteByOpiacee;
    public $numberOfUrgenteByNSP;


    public function __construct(){}

    /**
     * Functie ce returneaza numarul de urgente in functie de an.
     * @return void
     */
    public function getNumberOfUrgenteByYearAndVarsta(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new UrgenteDrogVarstaController($db);
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByYearAndVarsta.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByYearAndVarsta.".json");
        } else {
            $stmt = $items->getByYearAndVarstaUrgenteDrog();
            $itemCount = $stmt->rowCount();
            $varste = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $varsta){
                        if($index == 3){
                            $varste[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$varsta.' ';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $varsta. ' ';

                            }
                            if ($index == 1) {

                                $concat = $concat . $varsta.';';

                            }
                            if($index == 2){
                                $concat = $concat . $varsta;
                            }
                        }
                        $index++;
                    }
                }
                $varste[] = $concat;
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByYearAndVarsta.".json","w");
                fwrite($handle, json_encode(array($varste)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($varste)) . "\n \n \n ";
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
        $items = new UrgenteDrogVarstaController($db);
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByCanabis.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByCanabis.".json");
        } else {
            $stmt = $items->getVarstaCanabisByYear();
            $itemCount = $stmt->rowCount();
            $varste = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $varsta){
                        if($index == 3){
                            $varste[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$varsta.' ';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $varsta . ' ';

                            }
                            if ($index == 1) {

                                $concat = $concat . $varsta.';';

                            }
                            if($index == 2){
                                $concat = $concat . $varsta;
                            }
                        }
                        $index++;
                    }
                }
                $varste[] = $concat;
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByCanabis.".json","w");
                fwrite($handle, json_encode(array($varste)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($varste)) . "\n \n \n ";
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
        $items = new UrgenteDrogVarstaController($db);
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByStimulanti.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByStimulanti.".json");
        } else {
            $stmt = $items->getVarstaStimulantiByYear();
            $itemCount = $stmt->rowCount();
            $varste = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $varsta){
                        if($index == 3){
                            $varste[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$varsta.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $varsta . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $varsta.';';

                            }
                            if($index == 2){
                                $concat = $concat . $varsta;
                            }
                        }
                        $index++;
                    }
                }
                $varste[] = $concat;
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByStimulanti.".json","w");
                fwrite($handle, json_encode(array($varste)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($varste)) . "\n \n \n ";
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
        $items = new UrgenteDrogVarstaController($db);
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByOpiacee.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByOpiacee.".json");
        } else {
            $stmt = $items->getVarstaOpiaceeByYear();
            $itemCount = $stmt->rowCount();
            $varste = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $varsta){
                        if($index == 3){
                            $varste[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$varsta.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $varsta . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $varsta.';';

                            }
                            if($index == 2){
                                $concat = $concat . $varsta;
                            }
                        }
                        $index++;
                    }
                }
                $varste[] = $concat;
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByOpiacee.".json","w");
                fwrite($handle, json_encode(array($varste)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($varste)) . "\n \n \n ";
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
        $items = new UrgenteDrogVarstaController($db);
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByNSP.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByNSP.".json");
        } else {
            $stmt = $items->getVarstaNSPByYear();
            $itemCount = $stmt->rowCount();
            $varste = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $varsta){
                        if($index == 3){
                            $varste[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$varsta.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $varsta . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $varsta.';';

                            }
                            if($index == 2){
                                $concat = $concat . $varsta;
                            }
                        }
                        $index++;
                    }
                }
                $varste[] = $concat;
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByNSP.".json","w");
                fwrite($handle, json_encode(array($varste)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($varste)) . "\n \n \n ";
            }
            else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No record found.")
                );
            }
        }
    }

    public function getNumberOfUrgenteByYear($an1): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new UrgenteDrogVarstaController($db);
        if(file_exists("src/static/cache/".$this->numberOfUrgenteByYear."_".$an1.".json")){
            include("src/static/cache/".$this->numberOfUrgenteByYear."_".$an1.".json");
        } else {
            $items->an = $an1;
            $stmt = $items->getAllByYear();
            $itemCount = $stmt->rowCount();
            $varste = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $varsta){
                        if($index == 3){
                            $varste[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$varsta.' ';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $varsta. ' ';

                            }
                            if ($index == 1) {

                                $concat = $concat . $varsta.';';

                            }
                            if($index == 2){
                                $concat = $concat . $varsta;
                            }
                        }
                        $index++;
                    }
                }
                $varste[] = $concat;
                $handle = fopen("src/static/cache/".$this->numberOfUrgenteByYear."_".$an1.".json","w");
                fwrite($handle, json_encode(array($varste)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($varste)) . "\n \n \n ";
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