<?php

namespace App\controllers;

use App\ViewManager;

// class HomeController {
//     private $viewManager;
    
//     //Inyectamos el objeto en el contenedor para pooder usarlo cuando queramos. EL ya sabe que objeto del contenedor tenemos que coger y lo inyecta en el constructor sin tener que hacer la pesca que hemos hecho en RouterManager(en Router Manager también lo podríasmo hacer así). En el Router Manager hemos cargado el contenedor entero, aquí solamente la dependencia que necesitamos
//     public function __construct(ViewManager $viewManager){//le pasamos el ViewManager y lo guardamos en $viewManager
//         $this->viewManager = $viewManager;
//     }

//     public function index(){
//         $viewManager->renderTemplate("index.twig.html");

//     }
// }

class HomeController extends Controller{//heredamos las porpiedades de Controller
    
       public function index(){
        $this->viewManager->renderTemplate("index.twig.html");

    }
}
