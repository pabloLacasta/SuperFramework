<?php
namespace App\db\entities;
use Doctrine\ORM\Mapping as ORM;
//entidad User, donde le pondemos las anotaciones

/**
 * @ORM\Entity
 * @ORM\Table(name = "users")
 */

 class User extends Entity{
//configuro el valor de if mediante anotaciones. Le digo que es autoincremental...Lo mismo haré con el resto de valores de la tabla
    /**
     * @ORM\Id
     * @ORM\Column(type = "integer")
     * @ORM\GeneratedValue(strategy = "IDENTITY")
     */

     protected $id;

     /**
      * @ORM\Column(type = "string")
      */

     protected $name;

     /**
      * @ORM\Column(type = "string")
      */

      protected $email;

      /**
      * @ORM\Column(type = "string")
      */

     protected $password;

     /**
      * @ORM\Column(type = "datetime")
      */

      protected $created_at;

      /**
      * @ORM\Column(type = "datetime")
      */

      protected $updated_at;

      public function __construct(){
          $this->created_at = new \DateTime('now');
      }


 }