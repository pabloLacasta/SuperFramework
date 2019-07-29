<?php

namespace App;
use Twig;

class viewManager{
    //creamos objeto twig para poder llamarlo desde cualquuier lado
    private $twig;

    public function __construct(){
        $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__).'/templates');//le decimos a twig donde van a estar todas las vistas 
        $this->twig = new \Twig\Environment($loader , //
        ['cache'=>dirname(__DIR__).'/cache/views']);//ARCHIVOS temporales con los elementeos ya bindeados así va más rápida la navegación. Precacheamos.
    }


public function render($view, $args = []){
    if($args != null){//comprobamos que la vista que queremos cargar exista
        extract ($args, EXTR_SKIP);//descomponemos la array en diferentes elementos
    }
    $file = dirname(__DIR__).'/templates'.$view;
    if(is_readable($file)){
        require $file;}
        else{
            throw new \InvalidArgumentException();
        }
    }

    public function renderTemplate($template, $args = []){
        echo $this->twig->render($template, $args);
    }
}