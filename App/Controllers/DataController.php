<?php

use App\Models\User;

/**
 * Created by PhpStorm.
 * User: Alos
 * Date: 1/27/2024
 * Time: 3:48 AM
 */

class UserController{


    public function __construct(Request $request){
        
    }

    public function index(){
        $users = User::getAll();
        $this->render('users', ['users' => $users]);
    }

    public function create(){
        if($this->request->isPost()){
        $user = new User();
        $user->setTitle($this->request->getPost('title'));
        $user->setDescription($this->request->getPost('description'));
        $user->setImg($this->request->getPost('img'));
        $user->save();

        $this->redirect('/users');
        }
    }

    public function update($id){
        if($this->request->isPost()){
            $user = User::find($id);
            if(!$user){
                $this->redirect('/users');
            }

            $user->setTitle($this->request->getPost('title'));
            $user->setDescription($this->request->getPost('description'));
            $user->setImg($this->request->getPost('img'));
            $user->save();

            $this->redirect('/users');
        }
    }

    public function delete($id){
        User::delete($id);
        $this->redirect('/users');
    }
}