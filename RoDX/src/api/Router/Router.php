<?php

use controller\ActivitatiController;
use controller\CampaniiController;
use controller\CapturiController;
use controller\CondamnariController;
use controller\InfractiuniController;
use controller\UrgenteDrogConsumController;
use controller\UrgenteDrogDiagnosticController;
use controller\UrgenteDrogSexController;
use controller\UrgenteDrogVarstaController;

use api\DataBaseConn;

/*include_once '../Model/dbconnection/DatabaseConnector.php';
include_once '../Model/controller/ScreenActorsController.php';
include_once '../Model/connection/TMDBController.php';*/

include_once '../api/controller/ActivitatiController.php';
include_once '../api/controller/CampaniiController.php';
include_once '../api/controller/CapturiController.php';
include_once '../api/controller/CondamnariController.php';
include_once '../api/controller/InfractiuniController.php';
include_once '../api/controller/UrgenteDrogConsumController.php';
include_once '../api/controller/UrgenteDrogDiagnosticController.php';
include_once '../api/controller/UrgenteDrogSexController.php';
include_once '../api/controller/UrgenteDrogVarstaController.php';


class Router
{
    private const METHOD_POST = 'POST';
    private const METHOD_GET = 'GET';

    public DataBaseConn $databaseConnector;
    private PDO $dbConnection;
    private $notFoundHandler;
    private ActivitatiController $activitati;
    private CampaniiController $campanii;
    private CapturiController $capturi;
    private CondamnariController $condamnari;
    private InfractiuniController $infractiuni;
    private UrgenteDrogSexController $drogSex;
    private UrgenteDrogConsumController $drogConsum;
    private UrgenteDrogVarstaController $drogVarsta;
    private UrgenteDrogDiagnosticController $drogDiagnostic;
    private array $handlers;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->databaseConnector = new DataBaseConn();
        $this->dbConnection = $this->databaseConnector->getConnection();
        $this->activitati = new ActivitatiController($this->dbConnection);
    }

    /**
     * Not Found handler.
     * @param $handler
     * @return void
     */
    public function addNotFoundHandlder($handler): void
    {
        $this->notFoundHandler = $handler;
    }

    /**
     * Get Method - Http Request.
     * @param string $path
     * @param $handler
     * @return void
     */
    public function get(string $path, $handler): void
    {
        $this->addHandler(self::METHOD_GET, $path, $handler);
    }

    /**
     * Post Method - Http Request.
     * @param string $path
     * @param $handler
     * @return void
     */
    public function post(string $path, $handler): void
    {
        $this->addHandler(self::METHOD_POST, $path, $handler);
    }

    /**
     * Add Handler Function.
     * @param string $path
     * @param $handler
     * @return void
     */
    private function addHandler(string $method, string $path, $handler): void
    {
        $this->handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler
        ];
    }

    /**
     * Run function for starting the application.
     * @param string $path
     * @param $handler
     * @return void
     */
    public function run()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI']);
        $requestPath = $requestUri['path'];
        $method = $_SERVER['REQUEST_METHOD'];
        /*        var_dump($requestPath);*/

        $callback = null;
        foreach ($this->handlers as $handler) {
            if ($handler['path'] === $requestPath && $method === $handler['method']) {
                $callback = $handler['handler'];
            }
        }

        if (is_string($callback)) {
            $parts = explode('::', $callback);
            if (is_array($parts)) {
                $className = array_shift($parts);
                $handler = new $className;

                $method = array_shift($parts);
                $callback = [$handler, $method];
            }
        }
        if (!$callback) {
            header("HTTP/1.0 404 Not Found");
            if (!empty($this->notFoundHandler)) {
                $callback = $this->notFoundHandler;
            }

        }

        call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
    }


}