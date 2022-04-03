<?php

namespace coding\app\controllers;

use coding\app\models\Payment;

class PaymentController extends Controller{

    function listAll(){
        $payment=new Payment();
        $all_payment=$payment->getAll();

        $this->view('Dashboard/list_payment',$all_payment);

    }

    function create(){
        $this->view('Dashboard/add_payment');

    }

    function AddPayment(){
        print_r($_POST);
        print_r($_FILES);
        $payment=new Payment();
        
        $payment->name=$_POST['name'];
        $imageName=$this->uploadFile($_FILES['image']);

        $payment->image=$imageName!=null?$imageName:"default.png";
        $payment->created_by=1;
        $payment->is_active=$_POST['is_active'];

        $payment->save();
        if($payment->save())
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


    public static function uploadFile(array $imageFile): string
    {
        // check images direction
        if (!is_dir(__DIR__ . '/../../public/images')) {
            mkdir(__DIR__ . '/../../public/images');
        }

        if ($imageFile && $imageFile['tmp_name']) {
            $image = explode('.', $imageFile['name']);
            $imageExtension = end($image);

            $imageName = uniqid(). "." . $imageExtension;
            $imagePath =  __DIR__ . '/../../public/images/' . $imageName;

            move_uploaded_file($imageFile['tmp_name'], $imagePath);

            return $imageName;
        }

        return null;
    }

    




}

?>