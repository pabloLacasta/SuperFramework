<?php

namespace App\controllers;



//GEstionamos tofos los controlladores de la vista


use App\ViewManager;
use App\DoctrineManager;
use App\LogManager;
use Kint;


abstract class Controller{
    protected $viewManager;//para que cuando lo herede el hijo sea privado
    protected $doctrineManager;
    protected $logManager;

    public function __construct(ViewManager $viewManager, DoctrineManager $doctrineManager, LogManager $logManager){
        $this->viewManager = $viewManager;
        $this->doctrineManager = $doctrineManager;
        $this->logManager = $logManager;
        $this->logManager->info("Controlador ->".get_class($this)." cargado");
    }

    public abstract function index();

    public function redirectTo(string $page){
        $host = $_SERVER['HTTP_POST'];
        header("Location: http://$host/$page");
    }
}

