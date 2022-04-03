<?php
namespace coding\app\controllers;

use coding\app\models\Author;

class AuthorController extends Controller{

    public function AddAuthor(){
        $author=new Author();
        $author->name=$_POST['name'];
        $author->phone=$_POST['phone'];
        $author->bio=$_POST['bio'];
        $author->email=$_POST['email'];
        $author->created_by=1;
        $author->is_active=isset($_POST['is_active'])?1:0 ;
        $author->save();
        if($author->save())
        $this->view('feedback',['success'=>'data inserted successful']);
        else 
        $this->view('feedback',['danger'=>'can not add data']);
    }

    public function show(){
        $this->view('Dashboard/new_author');
    }

}
?>