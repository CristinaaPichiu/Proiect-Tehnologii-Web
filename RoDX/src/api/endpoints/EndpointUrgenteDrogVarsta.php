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
        if(file_exists($this->numberOfUrgenteByYearAndVarsta.".php")){
            include($this->numberOfUrgenteByYearAndVarsta.".php");
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
                                $concat=$concat.$varsta.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $varsta. ';';

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
                $handle = fopen($this->numberOfUrgenteByYearAndVarsta.".php","w");
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
        if(file_exists($this->numberOfUrgenteByCanabis.".php")){
            include($this->numberOfUrgenteByCanabis.".php");
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
                $handle = fopen($this->numberOfUrgenteByCanabis.".php","w");
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
        if(file_exists($this->numberOfUrgenteByStimulanti.".php")){
            include($this->numberOfUrgenteByStimulanti.".php");
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
                $handle = fopen($this->numberOfUrgenteByStimulanti.".php","w");
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
        if(file_exists($this->numberOfUrgenteByOpiacee.".php")){
            include($this->numberOfUrgenteByOpiacee.".php");
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
                $handle = fopen($this->numberOfUrgenteByOpiacee.".php","w");
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
        if(file_exists($this->numberOfUrgenteByNSP.".php")){
            include($this->numberOfUrgenteByNSP.".php");
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
                $handle = fopen($this->numberOfUrgenteByNSP.".php","w");
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