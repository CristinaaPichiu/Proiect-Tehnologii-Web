<?php
namespace endpoints;
use PDO;
use PDOException;
use api\DataBaseConn;
use controller\CondamnariController;

header('Content-Type:application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

class EndpointCondamnari {

    public $varstaFemei;
    public $varstaBarbati;
    public $varstaMajori;
    public $varstaMinori;
    public $sex;
    public $varsta;

    public function __construct(){}

    public function getAllByVarstaFemei(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new CondamnariController($db);
        if (file_exists($this->varstaFemei . ".php")) {
            include($this->varstaFemei . ".php");
        }
        else{
            $stmt = $items->getByVarstaFemei();
            $itemCount = $stmt->rowCount();
            $femei = array();
            if ($itemCount > 0) {
                $index = 0;
                $concat = "";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    foreach ($row as $femeie) {
                        if ($index == 1) {
                            $femei[] = $concat;
                            $concat = "";
                            $index = 0;
                            if ($index == 0) {

                                $concat = $concat . $femeie . ';';

                            }
                        } 
                        else {
                            if ($index == 0) {
                                $concat = $concat . $femeie . ';';

                            }
                        }
                        $index++;
                    }
                }
                $femei[] = $concat;
                $handle = fopen($this->varstaFemei . ".php", "w");
                fwrite($handle, json_encode(array($femei)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($femei)) . "\n \n \n ";
            }
            else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No record found.")
                );
            }
        }
    }


    public function getAllByVarstaBarbati(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new CondamnariController($db);
        if (file_exists($this->varstaBarbati . ".php")) {
            include($this->varstaBarbati . ".php");
        }
        else{
            $stmt = $items->getByVarstaBarbati();
            $itemCount = $stmt->rowCount();
            $barbati = array();
            if ($itemCount > 0) {
                $index = 0;
                $concat = "";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    foreach ($row as $linie) {
                        if ($index == 1) {
                            $barbati[] = $concat;
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
                        }
                        $index++;
                    }
                }
                $barbati[] = $concat;
                $handle = fopen($this->varstaBarbati . ".php", "w");
                fwrite($handle, json_encode(array($barbati)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($barbati)) . "\n \n \n ";
            }
            else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No record found.")
                );
            }
        }
    }
    

    public function getAllByVarstaMajori(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new CondamnariController($db);
        if (file_exists($this->varstaMajori . ".php")) {
            include($this->varstaMajori . ".php");
        }
        else{
            $stmt = $items->getByVarstaMajori();
            $itemCount = $stmt->rowCount();
            $majori = array();
            if ($itemCount > 0) {
                $index = 0;
                $concat = "";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    foreach ($row as $linie) {
                        if ($index == 1) {
                            $majori[] = $concat;
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
                        }
                        $index++;
                    }
                }
                $majori[] = $concat;
                $handle = fopen($this->varstaMajori . ".php", "w");
                fwrite($handle, json_encode(array($majori)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($majori)) . "\n \n \n ";
            }
            else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No record found.")
                );
            }
        }

    }

    public function getAllByVarstaMinori(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new CondamnariController($db);
        if (file_exists($this->varstaMinori . ".php")) {
            include($this->varstaMinori . ".php");
        }
        else{
            $stmt = $items->getByVarstaMinori();
            $itemCount = $stmt->rowCount();
            $minori = array();
            if ($itemCount > 0) {
                $index = 0;
                $concat = "";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    foreach ($row as $linie) {
                        if ($index == 1) {
                            $minori[] = $concat;
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
                        }
                        $index++;
                    }
                }
                $minori[] = $concat;
                $handle = fopen($this->varstaMinori . ".php", "w");
                fwrite($handle, json_encode(array($minori)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($minori)) . "\n \n \n ";
            }
            else {
                http_response_code(404);
                echo json_encode(
                    array("message" => "No record found.")
                );
            }
        }
    }

    public function getAllBySexEndpoint(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new CondamnariController($db);
        if (file_exists($this->sex . ".json")) {
            include($this->sex . ".json");
        }
        else{
            $stmt = $items->getAllBySex();
            $itemCount = $stmt->rowCount();
            $sexe = array();
            if ($itemCount > 0) {
                $index = 0;
                $concat = "femei;";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    foreach ($row as $linie) {
                        if ($index == 1) {
                            $sexe[] = $concat;
                            $concat = "barbati;";
                            $index = 0;
                            if ($index == 0) {

                                $concat = $concat . $linie ;

                            }
                        } 
                        else {
                            if ($index == 0) {
                                $concat = $concat . $linie;

                            }
                        }
                        $index++;
                    }
                }
                $sexe[] = $concat;
                $handle = fopen($this->sex . ".json", "w");
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

    public function getAllByVarstaEndpoint(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new CondamnariController($db);
        if (file_exists($this->varsta . ".php")) {
            include($this->varsta . ".php");
        }
        else{
            $stmt = $items->getAllByVarsta();
            $itemCount = $stmt->rowCount();
            $varste = array();
            if ($itemCount > 0) {
                $index = 0;
                $concat = "";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    foreach ($row as $linie) {
                        if ($index == 1) {
                            $varste[] = $concat;
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
                        }
                        $index++;
                    }
                }
                $varste[] = $concat;
                $handle = fopen($this->varsta . ".php", "w");
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