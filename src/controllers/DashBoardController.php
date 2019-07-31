<?php

namespace App\controllers;

use App\controllers\Controller;

class DashboardController extends Controller{
    public function index(){
        $this->viewManager->renderTemplate('dashboard.twig.html');
    }
}