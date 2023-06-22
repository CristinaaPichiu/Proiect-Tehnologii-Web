<?php

use controller\CondamnariController;
use api\DataBaseConn;
use endpoints\EndpointCondamnari;

header('Content-Type:application/json');
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");

class Endpoint
{
    public $allBySex ="../cache/CondamnariSex";
    public $firstTime = false;
}
?>