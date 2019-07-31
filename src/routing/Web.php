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
                $route->addRoute('GET', '/users', ['App\controllers\UserController','index']);
                $route->addRoute('GET', '/posts', ['App\controllers\PostController','index']);
                $route->addRoute('GET','/register',['App\controllers\auth\RegisterController','index']);
                $route->addRoute('POST','/register',['App\controllers\auth\RegisterController','register']);//Post es el método del formulario de registro. REgister es el metodo que se ejecutara cuando se llleve a cabo un POST en /register
                $route->addRoute('GET','/login',['App\controllers\auth\LoginController','index']);
                $route->addRoute('POST','/login',['App\controllers\auth\LoginController','login']);//Post es el método del formulario de login. REgister es el metodo que se ejecutara cuando se llleve a cabo un POST en /login

            }
        );
    }
}