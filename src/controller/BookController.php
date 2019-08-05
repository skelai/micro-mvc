<?php

class BookController
{

    public static function list()
    {

        // 1. Appel du Model
        $books = Book::findAll();

        // 2. Return/include de la view
        include(__DIR__ . '/../views/books/list.php');
    }

    public static function read(int $id)
    {

        // 1. Appel du Model
        $book = Book::findById($id);
        // 2. Include de la lview
        include(__DIR__ . '/../views/books/read.php');
    }

    //CREAT : execute
    public static function new($params){
        $book = Book::new($params);
        //include(__DIR__ . '/../views/books/list.php');
    }

    //new : affiche la vue
    public static function create()
    {
        include(__DIR__ . '/../views/books/new.php');
    }

    public static function edit($id)
    {
        $bookEdit = Book::findById($id);
        include(__DIR__ . '/../views/books/edit.php');
    }

    public static function update($params){
        $bookEdit = Book::update($params);
    }

    public static function delete($id)
    {
        $book = Book::delete($id); 
    }
}
