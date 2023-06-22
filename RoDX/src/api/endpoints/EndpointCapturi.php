<?php
namespace endpoints;
use PDO;
use PDOException;
use api\DataBaseConn;
use controller\CapturiController;

header('Content-Type:application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

class EndpointCapturi {

    public $capturiGrame;
    public $capturiDrog;

    public function __construct(){}

    public function getAllByCapturiGrameEndpoint(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new CapturiController($db);
        if(file_exists($this->capturiGrame.".php")){
            include($this->capturiGrame.".php");
        }
        else{
            $stmt = $items->getAllCapturiGrame();
            $itemCount =$stmt->rowCount();
            $droguri =array();
            if ($itemCount > 0) {
                $index = 0;
                $concat = "";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    foreach ($row as $linie) {
                        if ($index == 3) {
                            $droguri[] = $concat;
                            $concat = "";
                            $index = 0;
                            if ($index == 0) {
                                $concat = $concat . $linie . ';';
                            }
                        } 
                        else {
                            if ($index == 0) {
                                $concat = $concat . $linie . ';';
                            }
                            if ($index == 1) {
                                $concat = $concat . $linie . ';';
                            }
                           
                            if ($index == 2) {
                                $concat = $concat . $linie;
                            }
                        }
                        $index++;
                    }
                }
                $droguri[] = $concat;
                $handle = fopen($this->capturiGrame . ".php", "w");
                fwrite($handle, json_encode(array($droguri)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($droguri)) . "\n \n \n ";
            }
            else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No record found.")
                );
            }
        }
    }

    public function getAllByDrogEndpoint($drog): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new CapturiController($db);
        if(file_exists($this->capturiDrog."_".$drog.".php")){
            include($this->capturiDrog."_".$drog.".php");
        }
        else{
            $stmt = $items->getAllByDrog($drog);
            $itemCount =$stmt->rowCount();
            $droguri =array();
            if ($itemCount > 0) {
                $index = 0;
                $concat = "";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    foreach ($row as $linie) {
                        if ($index == 6) {
                            $droguri[] = $concat;
                            $concat = "";
                            $index = 0;
                            if ($index == 0) {
                                $concat = $concat . $linie . ';';
                            }
                        } 
                        else {
                            if ($index == 0) {
                                $concat = $concat . $linie . ';';
                            }
                            if ($index == 1) {
                                $concat = $concat . $linie . ';';
                            }
                            if ($index == 2) {
                                $concat = $concat . $linie. ';';
                            }
                            if ($index == 3) {
                                $concat = $concat . $linie. ';';
                            }
                            if ($index == 4) {
                                $concat = $concat . $linie. ';';
                            }
                            if ($index == 5) {
                                $concat = $concat . $linie;
                            }
                        }
                        $index++;
                    }
                }
                $droguri[] = $concat;
                $handle = fopen($this->capturiDrog."_".$drog.".php", "w");
                fwrite($handle, json_encode(array($droguri)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($droguri)) . "\n \n \n ";
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