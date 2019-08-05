<?php

class SubscriberBookController {

    public static function list() {
        $subscriberBooks = SubscriberBook::findAll();
        include(__DIR__ . '/../views/subscriber_book/list.php');
    }

    public static function create() {
        $subscribers = Subscriber::findAll();
        $books = Book::findAll();
        include(__DIR__ . '/../views/subscriber_book/new.php');
    }

    public static function new($params) {
        $subscriberBook = SubscriberBook::new($params);
    }

    public static function delete($id) {
        $subscriberBook = SubscriberBook::delete($id);
    }
}