<?php
namespace endpoints;
use PDO;
use PDOException;
use api\DataBaseConn;
use controller\UrgenteDrogSexController;

header('Content-Type:application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

class EndpointUrgenteDrogSex{

    public $numberOfUrgenteByYearAndSex;
    public $numberOfUrgenteByCanabis;
    public $numberOfUrgenteByStimulanti;
    public $numberOfUrgenteByOpiacee;
    public $numberOfUrgenteByNSP;


    public function __construct(){}

    /**
     * Functie ce returneaza numarul de urgente in functie de an.
     * @return void
     */
    public function getNumberOfUrgenteByYearAndSex(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new UrgenteDrogSexController($db);
        if(file_exists($this->numberOfUrgenteByYearAndSex.".php")){
            include($this->numberOfUrgenteByYearAndSex.".php");
        } else {
            $stmt = $items->getByYearAndSexUrgenteDrog();
            $itemCount = $stmt->rowCount();
            $sexe = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $sex){
                        if($index == 3){
                            $sexe[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$sex.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $sex. ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $sex.';';

                            }
                            if($index == 2){
                                $concat = $concat . $sex;
                            }
                        }
                        $index++;
                    }
                }
                $sexe[] = $concat;
                $handle = fopen($this->numberOfUrgenteByYearAndSex.".php","w");
                fwrite($handle, json_encode(array($sexe)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($sexe)) . "\n \n \n ";
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
        $items = new UrgenteDrogSexController($db);
        if(file_exists($this->numberOfUrgenteByCanabis.".php")){
            include($this->numberOfUrgenteByCanabis.".php");
        } else {
            $stmt = $items->getSexCanabisByYear();
            $itemCount = $stmt->rowCount();
            $sexe = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $sex){
                        if($index == 3){
                            $sexe[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$sex.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $sex . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $sex.';';

                            }
                            if($index == 2){
                                $concat = $concat . $sex;
                            }
                        }
                        $index++;
                    }
                }
                $sexe[] = $concat;
                $handle = fopen($this->numberOfUrgenteByCanabis.".php","w");
                fwrite($handle, json_encode(array($sexe)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($sexe)) . "\n \n \n ";
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
        $items = new UrgenteDrogSexController($db);
        if(file_exists($this->numberOfUrgenteByStimulanti.".php")){
            include($this->numberOfUrgenteByStimulanti.".php");
        } else {
            $stmt = $items->getSexStimulantiByYear();
            $itemCount = $stmt->rowCount();
            $sexe = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $sex){
                        if($index == 3){
                            $sexe[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$sex.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $sex . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $sex.';';

                            }
                            if($index == 2){
                                $concat = $concat . $sex;
                            }
                        }
                        $index++;
                    }
                }
                $sexe[] = $concat;
                $handle = fopen($this->numberOfUrgenteByStimulanti.".php","w");
                fwrite($handle, json_encode(array($sexe)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($sexe)) . "\n \n \n ";
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
        $items = new UrgenteDrogSexController($db);
        if(file_exists($this->numberOfUrgenteByOpiacee.".php")){
            include($this->numberOfUrgenteByOpiacee.".php");
        } else {
            $stmt = $items->getSexOpiaceeByYear();
            $itemCount = $stmt->rowCount();
            $sexe = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $sex){
                        if($index == 3){
                            $sexe[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$sex.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $sex . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $sex.';';

                            }
                            if($index == 2){
                                $concat = $concat . $sex;
                            }
                        }
                        $index++;
                    }
                }
                $sexe[] = $concat;
                $handle = fopen($this->numberOfUrgenteByOpiacee.".php","w");
                fwrite($handle, json_encode(array($sexe)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($sexe)) . "\n \n \n ";
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
        $items = new UrgenteDrogSexController($db);
        if(file_exists($this->numberOfUrgenteByNSP.".php")){
            include($this->numberOfUrgenteByNSP.".php");
        } else {
            $stmt = $items->getSexNSPByYear();
            $itemCount = $stmt->rowCount();
            $sexe = array();
            if($itemCount > 0){
                $index = 0;
                $concat ="";
                while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
                    foreach($row as $sex){
                        if($index == 3){
                            $sexe[] = $concat;
                            $concat = "";
                            $index = 0;
                            if($index==0){
                                $concat=$concat.$sex.';';
                            }
                        }
                        else {
                            if ($index == 0) {
                                $concat = $concat . $sex . ';';

                            }
                            if ($index == 1) {

                                $concat = $concat . $sex.';';

                            }
                            if($index == 2){
                                $concat = $concat . $sex;
                            }
                        }
                        $index++;
                    }
                }
                $sexe[] = $concat;
                $handle = fopen($this->numberOfUrgenteByNSP.".php","w");
                fwrite($handle, json_encode(array($sexe)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($sexe)) . "\n \n \n ";
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