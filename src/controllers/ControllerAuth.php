<?php

namespace App\controllers;

use App\ViewManager;
use App\DoctrineManager;
use App\LogManager;
use App\SessionManager;
use Kint;

abstract class ControllerAuth{
    protected $viewManager;
    protected $doctrineManager;
    protected $logManager;
    protected $sessionManager;
    protected $user;

    public function __construct(ViewManager $viewManager, DoctrineManager $doctrine, LogManager $logManager, SessionManager $sessionManager){
        $this -> viewManager = $viewManager;
        $this -> doctrineManager = $doctrine;
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