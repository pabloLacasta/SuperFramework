<?php

namespace App\routing;

use FastRoute\Dispatcher;

class Web{
    //creamos gfucion estática para no tener que instanciar al objeto par usar la función

    public  static function getDispatcher():Dispatcher{
        return \FastRoute\simpleDispatcher(
            function (\FastRoute\RouteCollector $route) {
                $route->addRoute('GET', '/', ['App\controllers\HomeController', 'index']);     //cualquier peticion sobre home va a buscar en LA RUTA QUE LE HEMOS indicado y va a ejecutar index
                $route->addRoute('GET', '/quienes-somos', ['App\controllers\WhoController','index']);
                $route->addRoute('GET', '/donde-estamos', ['App\controllers\WhereController','index']);
                $route->addRoute('GET', '/usuarios', ['App\controllers\UserController','index']);
            }
        );
    }
}