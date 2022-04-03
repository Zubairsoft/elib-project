<?php

namespace coding\app\controllers;

use coding\app\models\Offer;
use coding\app\models\Category;
class OfferController extends Controller{

    function listAll(){
        $offer=new Offer();
        $allOffer=$offer->getAll();
        //print_r($allCategories);

        $this->view('Dashboard/list_offers',$allOffer);

    }

    function create(){
        $categories=new Category();
        $allCategoires=$categories->getAll();
       
        $viewConent=array('categories'=>$allCategoires);
        $this->view('Dashboard/add_offer',$viewConent);

    }

    function AddOffer(){
        print_r($_POST);
        print_r($_FILES);
        $offer=new Offer();
        
        $offer->title=$_POST['title'];
        $offer->discount=$_POST['discount'];
        $offer->start_date=$_POST['start_date'];
        $offer->end_date=$_POST['end_date'];
        $offer->created_by=1;
        $offer->is_active=$_POST['is_active'];

        $offer->save();
        if($offer->save())
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