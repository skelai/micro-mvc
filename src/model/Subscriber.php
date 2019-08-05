<?php

class Subscriber extends AbstractDb {

    public static function findAll() {

        $bdd = self::connectDb();
        $request = 'SELECT * FROM subscriber';
        $response = $bdd->query($request);
        return $response->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function findById(int $id) {

        $bdd = self::connectDb();
        $request = 'SELECT * FROM subscriber WHERE id = ' . $id;
        $response = $bdd->query($request);
        return $response->fetch(PDO::FETCH_ASSOC);
    }

    public static function new($params) {

        $bdd = self::connectDb();
        $request =$bdd->prepare( 'INSERT INTO subscriber (firstName, lastName) VALUES (:firstName,:lastName)');
        $request->execute(array(
            'firstName'=>$params['firstName'],
            'lastName'=>$params['lastName']
        ));
        echo 'Le subscriber a bien été ajouté !';
    }

    public static function update($params) {
        $bdd = self::connectDb();
        $request = $bdd->prepare('UPDATE subscriber SET firstName = :firstName, lastName = :lastName WHERE id = :id');
        $request->execute(array(
            'id' => $params['id'],
            'firstName' => $params['firstName'],
            'lastName' => $params['lastName']
        ));
        echo "l'abonné a bien été modifié";
    }

    public static function delete(int $id)
    { 
        $bdd = self::connectDb();
        $request = 'DELETE FROM subscriber WHERE id = ' . $id;
        $bdd->query($request);
        echo "l'abonné a bien été supprimé";
    }
}