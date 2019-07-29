<?php
namespace App\controllers;
use App\db\entities\User;
use Kint;
class PostController extends Controller
{
    public function index(){
        $posts = $this->doctrineManager->em->getRepository(User::class)->findAll();
        $this->viewManager->renderTemplate('posts.twig.html',['posts'=>$posts]);
    }
} 