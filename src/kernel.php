<?php


namespace App;
//no es necesario poner el use ViewManager porque sabe que está dentro del espacio de nombres App
use Kint;
use App\routing\Web;

use \DI\Container;// DI = Dependency Injector
use \DI\ContainerBuilder;

class Kernel 
//kernel es la clase, núcleo/core en el que se va  a arrancar todos los servicios
{

    private  $container;
    private $logger;
    private static $instance = NULL;

    private function __construct(){

        session_start();

        $this->container = $this->createContainer();//llamamos a la función creadorea del contenedor para que se cree

        $this->logger = $this->container->get(LogManager::class);// le decimos que se coja del container las dependencias de logger. Indicamos lo que estamos cogiendo y lo que es  ( en este caso una clase)

        $this->logger->info("Arrancamos el Server");
    }
    private function __clone(){}
    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new Kernel();
        }
        return self::$instance;
    }
    
    
        public function init(){
            $httpMethod = $_SERVER['REQUEST_METHOD'];
            $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $routeManager = $this->container->get(RouterManager::class);//llamamos al RouterManager delcontenedor de dependencias
            $routeManager->dispatch($httpMethod, $uri, Web::getDispatcher());// cargar imagenes y rutas asociadas.Get dispatcher devuelve una array con todas las rutas de la aplicacion
        }
    
    public function createContainer():Container{//funcion creadoa del contenedor del contenedor de dependencias.
        $containerBuilder = new ContainerBuilder();//ContainerBuilder() es una clase del DI que crea el contenedor
        $containerBuilder->useAutowiring(true);//Encuentra todas las dependencias y mételas en el contenedor en forma de objetos para poder usarlas cuando queramos
        return $containerBuilder->build();
    }
}
