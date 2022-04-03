<?php
namespace coding\app\controllers;

use coding\app\models\Publisher;

class PublisherController extends Controller{

    public function AddPublisher(){
        $publisher=new Publisher();
        $publisher->name=$_POST['name'];
        $publisher->phone=$_POST['phone'];
        $publisher->address=$_POST['address'];
        $publisher->fax=$_POST['fax'];
        $publisher->alt_phone=$_POST['alt_phone'];
        $publisher->email=$_POST['email'];
        $publisher->country=$_POST['country'];
        $publisher->image=$_POST['image'];

        $publisher->created_by=1;
        $publisher->is_active=isset($_POST['is_active'])?1:0 ;
        $publisher->save();
        if($publisher->save())
        $this->view('Dashboard/add_publisher',['success'=>'data inserted successful']);
        else 
        $this->view('feedback',['danger'=>'error']);
    }

    public function show(){
        $this->view('Dashboard/add_publisher');
    }

}