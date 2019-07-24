<?php

namespace App;
use App\routing\Web;

class Kernel{
    public function __construct(){
        $logManager = new LogManager();
        $logManager -> info("Arrancando la aplicacion");
        
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        $routerManager = new RouterManager();
        $routerManager -> dispatch($httpMethod, $uri, Web::getDispatcher());
    }
}
