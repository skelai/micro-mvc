<?php

class Book extends AbstractDb {

    public static function findAll() {

        $bdd = self::connectDb();

        // 2. request
        $request = 'SELECT * FROM book';

        // 3. execution de la request
        $response = $bdd->query($request);

        // 4. return des données
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id) {

        $bdd = self::connectDb();

        $request = 'SELECT * FROM book WHERE id = ' . $id;

        $response = $bdd->query($request);

        return $response->fetch(PDO::FETCH_ASSOC);
    }
}