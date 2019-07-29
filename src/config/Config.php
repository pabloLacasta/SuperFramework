<?php


namespace App\config;
class Config
{
    public static function getDB(){
        return \parse_ini_file(dirname(__DIR__).'/database.ini');//Devuelve array con los datos parseados. Usamos métodos para leer archivos de configuración.
    }
} 