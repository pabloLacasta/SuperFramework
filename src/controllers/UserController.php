<?php
namespace App\controllers;
use App\DoctrineManager;
use App\db\entities\User;


class UserController extends Controller{

   

    public function index(){
        $users = $this->doctrine->em->getRepository(User::class)->findAll();
        \Kint::dump($users);
        $this->viewManager->renderTemplate(usersView.twig.html, ['users=>$users']);
    }
}