<?php
// para cotrolar las rutas d ela aplicacion con nikic/fast-route

namespace App;
use \DI\Container;

class RouterManager {
    private $container;
    public function __construct(Container $container){

        $this->container = $container;
    }

    public function dispatch(string $requestMethod, string $requestUri, \FastRoute\ Dispatcher $dispatcher){
        //reqMethod el tipo de peticion que le estamos metinedo
        //uri = url
        //dispatcjer els laarray con los objetso que hay dentro
        //dispatch devuelve array con diferentes elementos.Espera a que los eventos estén activos y ejecuta sus llamadas de retorno.
        $route = $dispatcher->dispatch($requestMethod, $requestUri);
        \Kint::dump($route);
        switch($route[0]){//route[0] contiene el mensaje del NOT_FOUND
            case \FastRoute\Dispatcher::NOT_FOUND:
            header("HTTP/1.0 404 Not Found");
            echo"<h1>Not FOUND </h1>";
            break;
            
            case \FastRoute\Dispatcher::FOUND:
           
            $controller = $route[1];//route[1] es una subrarray de route que tiene el controlador y el metodo
            $method = $route[2];//aqui realmente no hay nada, pero el call nos obliga   a meterlo
            $this->container->call($controller, $method);//call es un método de container y le decimos que ejecute un método controller
            break;

            case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                header("HTTP/1.0 405 Method not Allowed");
                echo "<h1>Method Not Allowed </h1>";
                break;
        }
    }
}