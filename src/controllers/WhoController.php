<?php

namespace App\controllers;

use App\ViewManager;

class WhoController extends Controller {
    public function index(){
        $this->viewManager->renderTemplate('who.twig.html');
    }
}