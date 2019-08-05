<?php

/**
 * Autoload Classes
 */

const CLASSES_SOURCES = [
    '/src',
    '/src/model',
    '/src/controller'
];

function autoloadClass($class)
{

    $sources = array_map(function ($folder) use ($class) {

        return __DIR__ . $folder . '/' . $class . '.php';
    }, CLASSES_SOURCES);

    foreach ($sources as $s) {

        if (file_exists($s)) {
            require_once($s);
        }
    }
}

spl_autoload_register('autoloadClass');



/**
 * Exemples de routes:
 *
 * /index.php?model=book&method=list
 * /index.php?model=book&method=read&id=3
 * /index.php?model=book&method=new
 * /index.php?model=book&method=create
 * /index.php?model=book&method=edit&id=
 * /index.php?model=book&method=delete&id=
 */

include('menu.php');

switch ($_GET['model']) {
    case 'subscriber':
            switch($_GET['method']) {

                case 'list':
                    SubscriberController::list();
                    break;
                case 'read':
                    SubscriberController::read( intval( $_GET['id'] ) );
                    break;
                case 'new':
                    SubscriberController::new($_POST);
                    break;
                case 'create':
                    SubscriberController::create();
                    break;
                case 'edit':
                    SubscriberController::edit($_GET['id']);
                    break;
                case 'update':
                    SubscriberController::update($_POST);
                    break;
                case 'delete':
                    SubscriberController::delete($_GET['id']);
                    break;
            }
        break;

    case 'subscriber_book':
        switch ($_GET['method']) {
            case 'list':
                SubscriberBookController::list();
                break;
            case 'create':
                SubscriberBookController::create();
                break;
            case 'new':
                SubscriberBookController::new($_POST);
                break;
            case 'delete':
                SubscriberBookController::delete($_GET['id']);
                break;
            default:
                # code...
                break;
        }
        break;

    case 'book':
            switch($_GET['method']) {
                case 'list':
                    BookController::list();
                    break;
                case 'read':
                    BookController::read( intval( $_GET['id'] ) );
                    break;
                case 'new':
                    BookController::new($_POST);
                    break;
                case 'create':
                    BookController::create();
                    break;
                case 'edit':
                    BookController::edit($_GET['id']);
                    break;
                case 'update':
                    BookController::update($_POST);
                    break;
                case 'delete':
                    BookController::delete($_GET['id']);
                    break;
            }
        break;

    default:
        # code...
        break;
}