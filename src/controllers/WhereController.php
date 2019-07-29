<?php

namespace App\controllers;

class Where extends Controller{
    public function index(){
       

        $this->viewManager->renderTemplate(where.twig.html);
}
}
