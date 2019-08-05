<?php

class BookController {

    public static function list() {

        // 1. Appel du Model
        $books = Book::findAll();

        // 2. Return/include de la view
        include( __DIR__ . '/../views/books/list.php');

    }

    public static function read(int $id) {

        // 1. Appel du Model
        $book = Book::findById($id);
        // 2. Include de la lview

        include(__DIR__ . '/../views/books/read.php');

    }

    public static function new() {

    }

    public static function edit($id) {

    }

    public static function delete($id) {

    }

}