<?php

namespace coding\app\controllers;

use coding\app\models\City;

class CityController extends Controller{

    function listAll(){
        $offer=new City();
        $allOffer=$offer->getAll();
        //print_r($allCategories);

        $this->view('Dashboard/list_cities',$allOffer);

    }

    function create(){
        $this->view('Dashboard/add_city');

    }

    function AddCity(){
        print_r($_POST);
        print_r($_FILES);
        $city=new City();
        
        $city->name=$_POST['name'];
        $city->created_by=1;
        $city->is_active=$_POST['is_active'];

        $city->save();
        if($city->save())
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