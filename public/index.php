<?php


require_once dirname(__DIR__).'/vendor/autoload.php';

use App\kernel;
// use Kint; //Debugger que hemos isntalado como dependencia

$kernel = new Kernel();
$kernel->init(); //corremos la funciçon que arranque el gestor de rutas del kernel

kint::dump($kernel);

?>