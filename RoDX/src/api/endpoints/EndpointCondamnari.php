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
        if (file_exists("src/static/cache/".$this->varstaFemei . ".json")) {
            include("src/static/cache/".$this->varstaFemei . ".json");
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
                $handle = fopen("src/static/cache/".$this->varstaFemei . ".json", "w");
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
        if (file_exists("src/static/cache/".$this->varstaBarbati . ".json")) {
            include("src/static/cache/".$this->varstaBarbati . ".json");
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
                $handle = fopen("src/static/cache/".$this->varstaBarbati . ".json", "w");
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
        if (file_exists("src/static/cache/".$this->varstaMajori . ".json")) {
            include("src/static/cache/".$this->varstaMajori . ".json");
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
                $handle = fopen("src/static/cache/".$this->varstaMajori . ".json", "w");
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
        if (file_exists("src/static/cache/".$this->varstaMinori . ".json")) {
            include("src/static/cache/".$this->varstaMinori . ".json");
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
                $handle = fopen("src/static/cache/".$this->varstaMinori . ".json", "w");
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
        if (file_exists("src/static/cache/".$this->sex . ".json")) {
            include("src/static/cache/".$this->sex . ".json");
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
                $handle = fopen("src/static/cache/".$this->sex . ".json", "w");
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
        if (file_exists("src/static/cache/".$this->varsta . ".json")) {
            include("src/static/cache/".$this->varsta . ".json");
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
                $handle = fopen("src/static/cache/".$this->varsta . ".json", "w");
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