<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Schulklasse
 *
 * @author Teilnehmer
 */
class Schulklasse {

    private $id;
    private $name;

    public function __construct($Name, $id = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
        }
        $this->name = $Name;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->name;
    }

    public static function getAll() {
        $db = DbConnect::getConnection();
        //sql statement mit prepared statements
        $stmt = $db->prepare("SELECT * FROM schulklasse");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $schulklasse = [];

        foreach ($rows as $row) {
            $schulklasse[] = new Schulklasse($row['name'], $row['id']);
        }
        return $schulklasse;
    }

    public static function insert(Schulklasse $k) {
        $db = DbConnect::getConnection();

        //sql statement mit prepared statements
        $stmt = $db->prepare("INSERT INTO schulklasse "
                . "VALUES(NULL,?)");
        $stmt->bindValue(1, $k->getName(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public static function getByLikeness($suchstring) {
        $db = DbConnect::getConnection();
        //$suchstring enthält den zu suchenden Teilstring 
        //sql Statement mit prepared Statements
        $stmt = $db->prepare("SELECT * FROM schulklasse WHERE Name LIKE ?");

        $stmt->bindValue(1, "%$suchstring%", PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $schulklasse = [];
        foreach ($rows as $row) {
            $schulklasse[] = new Schulklasse($row['Name'], $row['id']);
        }
        return $schulklasse;
    }

    public static function deleteById($id) {
        $db = DbConnect::getConnection();
        $stmt = $db->prepare("DELETE FROM schulklasse WHERE id = ?");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}
