<?php
namespace App\controllers;
use App\db\entities\User;
use Kint;
class UsersController extends Controller
{
    public function index(){
        $user = $dispatcher->dispatch($requestMethod, $requestUri);
        \Kint::dump($user);
        $users = $this->doctrineManager->em->getRepository(User::class)->findAll();
        $this->viewManager->renderTemplate('usersView.twig.html',['users'=>$users]);
    }
} 