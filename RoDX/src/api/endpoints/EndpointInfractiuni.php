<?php
namespace endpoints;
use PDO;
use PDOException;
use api\DataBaseConn;
use controller\InfractiuniController;

header('Content-Type:application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

class EndpointInfractiuni {

    public $infractiune;

    public function __construct(){}

    public function getAllInfractiuniEndpoint(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new InfractiuniController($db);
        if (file_exists($this->infractiune . ".php")) {
            include($this->infractiune . ".php");
        }
        else{
            $stmt = $items->getAllInfractiuni();
            $itemCount = $stmt->rowCount();
            $infractiuni = array();
            if ($itemCount > 0) {
                $index = 0;
                $concat = "";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    foreach ($row as $linie) {
                        if ($index == 1) {
                            $infractiuni[] = $concat;
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
                $infractiuni[] = $concat;
                $handle = fopen($this->infractiune . ".php", "w");
                fwrite($handle, json_encode(array($infractiuni)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($infractiuni)) . "\n \n \n ";
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