<?php

class SubscriberBook extends AbstractDb {

    public static function findAll() {

        $bdd = self::connectDb();
        $request = 'SELECT subscriber_book.id, subscriber.firstName, subscriber.lastName, book.title, book.author FROM subscriber_book JOIN book ON book.id = id_book JOIN subscriber ON subscriber.id = id_subscriber';
        $response = $bdd->query($request);
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function new($params) {
        $bdd = self::connectDb();
        $request = $bdd->prepare('INSERT INTO subscriber_book (id_subscriber, id_book) VALUES (:id_subscriber, :id_book)');
        $request->execute(array(
            'id_subscriber' => $params['id_subscriber'],
            'id_book' => $params['id_book']
        ));
        echo "Emprunt enregistré";
    }

    public static function delete(int $id)
    { 
        $bdd = self::connectDb();
        $request = 'DELETE FROM subscriber_book WHERE id = ' . $id;
        $bdd->query($request);
        echo "Emprunt supprimé";
    }
}