<?php

class SubscriberController {

    public static function list() {
        
        $subscribers = Subscriber::findAll();
        include(__DIR__.'/../views/subscribers/list.php');
    }

    public static function read(int $id)
    {

        // 1. Appel du Model
        $subscriber = Subscriber::findById($id);
        // 2. Include de la lview
        include(__DIR__ . '/../views/subscribers/read.php');
    }

    public static function new($params){
        $subscriber = Subscriber::new($params);
    }

    public static function create()
    {
        include(__DIR__ . '/../views/subscribers/new.php');
    }

    public static function edit($id)
    {
        $subscriberEdit = Subscriber::findById($id);
        include(__DIR__ . '/../views/subscribers/edit.php');
    }

    public static function update($params){
        $subscriberEdit = Subscriber::update($params);
    }

    public static function delete($id)
    {
        $subscriberEdit = Subscriber::delete($id); 
    }
}