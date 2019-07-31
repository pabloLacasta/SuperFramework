<?php

namespace App\controllers;



//GEstionamos tofos los controlladores de la vista


use App\ViewManager;
use App\DoctrineManager;
use Kint;


abstract class Controller{
    protected $viewManager;//para que cuando lo herede el hijo sea privado
    protected $doctrineManager;

    public function __construct(ViewManager $viewManager, DoctrineManager $doctrineManager){
        $this->viewManager = $viewManager;
        $this->doctrineManager = $doctrineManager;
    }

    public abstract function index();

    public function redirectTo(string $page){
        $host = $_SERVER['HTTP_POST'];
        header("Location: http://$host/$page");
    }
}

