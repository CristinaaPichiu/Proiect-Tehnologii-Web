<?php
namespace endpoints;
use PDO;
use PDOException;
use api\DataBaseConn;
use controller\CampaniiController;

header('Content-Type:application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

class EndpointCampanii {

    public $campanie;

    public function __construct(){}

    public function getBeneficiariCampanii(): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new CampaniiController($db);
        if (file_exists($this->campanie . ".json")) {
            include($this->campanie . ".json");
        }
        else{
            $stmt = $items->getNrBeneficiari();
            $itemCount = $stmt->rowCount();
            $camp = array();
            if ($itemCount > 0) {
                $index = 0;
                $concat = "";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    foreach ($row as $linie) {
                        if ($index == 2) {
                            $camp[] = $concat;
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
                                $concat = $concat . $linie;

                            }
                        }
                        $index++;
                    }
                }
                $camp[] = $concat;
                $handle = fopen($this->campanie . ".json", "w");
                fwrite($handle, json_encode(array($camp)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($camp)) . "\n \n \n ";
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