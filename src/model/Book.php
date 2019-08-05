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

    public static function new($params) {

        $bdd = self::connectDb();
        $request =$bdd->prepare( 'INSERT INTO book (title, author) VALUES (:title,:author)');
        $request->execute(array(
            'title'=>$params['title'],
            'author'=>$params['author']
        ));
        echo 'LIVRE ET AUTEUR AJOUTE : GOOD JOB !';
    }

    public static function update($params) {
        $bdd = self::connectDb();
        $request = $bdd->prepare('UPDATE book SET title = :title, author = :author WHERE id = :id');
        $request->execute(array(
            'id' => $params['id'],
            'title' => $params['title'],
            'author' => $params['author']
        ));
        echo 'le livre a bien été modifié';
    }

    public static function delete(int $id)
    { 
        $bdd = self::connectDb();
        $request = 'DELETE FROM book WHERE id = ' . $id;
        $bdd->query($request);
        echo 'le livre a bien été supprimer';
    }
}