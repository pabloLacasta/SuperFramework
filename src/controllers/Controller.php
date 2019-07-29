<?php

namespace App\controllers;



//GEstionamos tofos los controlladores de la vista





use App\ViewManager;

abstract class Controller{
    protected $viewManager;//para que cuando lo herede el hijo sea privado
    protected $doctrineManager;

    public function __construct(ViewManger $viewManager, DoctrineManager $doctrineManager){
        $this->viewManager = $viewManager;
    }

    public abstract function index();
}

