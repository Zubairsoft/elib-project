<?php
namespace coding\app\controllers;

use coding\app\models\Book;

class BookController extends Controller{

    public function AddBook(){
        $book=new Book();
        $book->title=$_POST['title'];
        $book->description=$_POST['description'];
        $book->pages_number=$_POST['pages_number'];
        $book->quantity=$_POST['quantity'];
        $book->price=$_POST['price'];
        $book->format=$_POST['format'];
        $imageName=$this->uploadFile($_FILES['image']);
        $book->image=$imageName!=null?$imageName:"default.png";
        $book->created_by=1;
        $book->is_active=isset($_POST['is_active'])?1:0 ;
        $book->save();
        if($book->save())
        $this->view('feedback',['success'=>'data inserted successful']);
        else 
        $this->view('feedback',['danger'=>'can not add data']);
    }

    public function show(){
        $this->view('Dashboard/add_book');
    }

    function listAll(){
        $books=new Book();
        $allbooks=$books->getAll();
      

        $this->view('Dashboard/list_book',$allbooks);

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