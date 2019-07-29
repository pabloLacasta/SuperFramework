<?php
namespace App;
use App\config\Config;
use Doctrine\ORM\Tools\Setup;
use Doctrine\Common\Annotations\AnnotationRegistry;


class DoctrineManager{
    //configuramos doctrine
    //Obtenemos la info del archivo de configuración

    public function __construct(){
        $dbconfig = Config::getDB();
        $paths = [
            dirname(__DIR__).'/db/entities',//__DIR__ devuelve el directorio del proyecto si le marcas el path
            dirname(__DIR__).'db/repositories'//db es para gestionar las bases de daros. database es para crearla
        ];
        $isDevmode = true;
        $config = 
        Setup::createAnotationMetadataConfiguration($paths, $isDevmode, null, null, false);
        AnnotationRegistry::registerLoader('class_exists');
        $this->em=EntityManager::create($dbconfig, $config);//em=entitymanager, es el objeto con el que llamaremos a todas las entidades
        }
    }   
