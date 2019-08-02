<?php

namespace App\controllers;

use App\ViewManager;
use App\LogManager;
use App\SessionManager;
use Kint;

abstract class ControllerAuth{
    protected $viewManager;
    protected $logManager;
    protected $sessionManager;
    protected $user;

    public function __construct(ViewManager $viewManager, LogManager $logManager, SessionManager $sessionManager){
        $this -> viewManager = $viewManager;
        $this -> logManager = $logManager;
        $this -> logManager -> info('Controlador ->'.get_class($this) . ' cargado');
        $this -> sessionManager = $sessionManager;

        if(!$this->sessionManager->get("user")) return $this->redirectTo('login');
        $this -> user = $this->sessionManager -> get("user");
    }

    public abstract function index();

    public function redirectTo(String $page){
        $host = $_SERVER['HTTP_HOST'];

        header("Location: http://$host/$page");
    }
}