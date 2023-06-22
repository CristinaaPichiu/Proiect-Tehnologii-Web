<?php
namespace endpoints;
use PDO;
use PDOException;
use api\DataBaseConn;
use controller\ActivitatiController;

header('Content-Type:application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

class EndpointActivitati {

    public $activitate;

    public function __construct(){}

    public function getAllByActivitateEndpoint($activ): void
    {
        $database = new DataBaseConn();
        $db = $database->getConnection();
        $items = new ActivitatiController($db);
        if(file_exists("src/static/cache/".$this->activitate."_". $activ.".json")){
            include("src/static/cache/".$this->activitate."_".$activ.".json");
        }
        else{
            $stmt = $items->getAllByActivitati($activ);
            $itemCount =$stmt->rowCount();
            $activitati =array();
            if ($itemCount > 0) {
                $index = 0;
                $concat = "";
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    foreach ($row as $linie) {
                        if ($index == 5) {
                            $activitati[] = $concat;
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
                                $concat = $concat . $linie;
                            }
                        
                        }
                        $index++;
                    }
                }
                $activitati[] = $concat;
                $handle = fopen("src/static/cache/".$this->activitate."_".$activ.".json", "w");
                fwrite($handle, json_encode(array($activitati)) . "\n \n \n ");
                fclose($handle);
                echo json_encode(array($activitati)) . "\n \n \n ";
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