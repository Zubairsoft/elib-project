<?php
namespace coding\app\controllers;

use coding\app\models\User;

class UsersController extends Controller{

    function newUser(){
        $this->view('Dashboard/add_user');
    }
    function listAll(){
        $user=new User();
        $all_user=$user->getAll();

        $this->view('Dashboard/list_user',$all_user);

    }

        public function show(){

    }

    public function saveUser(){

        //print_r($_POST);
        $user=new User();
        $user->name=$_POST['name'];
        $user->email=$_POST['email'];
        $user->password=md5($_POST['password']);
        $user->is_active=isset($_POST['is_active'])?1:0;
        $user->role_id=1;
        $user->save();
        if($user->save())
        
        $this->view('Dashboard/add_user',['success'=>'data inserted successful']);
        else 
        $this->view('Dashboard/add_user',['danger'=>'error']);

    }

   

    public function edit(){
        
    }
    public function delete(){
        
    }




}
?>