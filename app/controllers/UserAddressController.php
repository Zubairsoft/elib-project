<?php

namespace coding\app\controllers;

use coding\app\models\City;
use coding\app\models\userAddress;
class UserAddressController extends Controller{

  

    function create(){
        $city=new City;
        $all_city=$city->getAll();
        $view_city=array('cities'=>$all_city);
        $this->view('Dashboard/add_address',$view_city);

    }

    function AddAddress(){
   
        $address=new userAddress();
        
        $address->address=$_POST['address'];
      $address->phone=$_POST['phone'];
        $address->is_active=$_POST['is_active'];
        $address->city_id=$_POST['ci'];
        $address->save();
        if($address->save())
        $this->view('feedback',['success'=>'data inserted successful']);
        else 
        $this->view('feedback',['danger'=>'can not add data']);

    }
    function edit(){
        

    }
    function update(){

    }
    public function remove(){

    }


 

    




}

?>