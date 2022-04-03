<?php

namespace coding\app\controllers;

class CustomPageController extends Controller{

    public function notFound (){
        $this->view('404');

    }

    // public function notAuthroized(){
        
    // }
}
?>