<?php

namespace App\controllers\auth;
use App\controllers\Controller;
use App\db\entities\User;
use Kint;

class LoginController extends Controller
{
    private $error;//creamos variable para el mensaje de error para que no aparezca cuando refresquemos la página
    public function index(){
        $this->error = null;
        $this->viewManager->renderTemplate('login.twig.html');
    }

    public function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repository = $this->doctrineManager->em->getRepository(User::class);
        $user = $repository->findByEmail($email);
        if(!$user) {
            $this->error = "No existe usuario o Password Incorrecto";
            return $this->viewManager->renderTemplate('login.twig.html',['error'=>$this->error]);
        }
            echo $user->email;

            if($user[0]->password !== sha1($password)){
                $this->error = "No exixte usuario o Password incorrecto";
                return $this->viewManager->renderTemplate('login.twig.html',['error'=>$this->error]);
            }
            $this->sessionManager->put('user, $user');
            $this->redirectTo('paneldecontrol');
        }
    }
