<?php

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
        $stmt = $db->prepare("SELECT * FROM `schulklasse`");
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
    
    public static function update(Schulklasse $k) {
        $db = DbConnect::getConnection();

        //sql statement mit prepare statements
        //UPDATE [LOW_PRIORITY] [IGNORE] table_references
        // SET col_name1={expr1|DEFAULT} [, col_name2={expr2|DEFAULT}] ...
        // [WHERE where_condition]
        $stmt = $db->prepare("UPDATE schulklasse SET name=? WHERE id=?");
        $stmt->bindValue(1, $k->getVorname(), PDO::PARAM_STR);
        $stmt->bindValue(2, $k->getNachname(), PDO::PARAM_STR);
        $stmt->bindValue(3, $k->getSchulklassen_id(), PDO::PARAM_STR);
        $stmt->bindValue(4, $k->get_id(), PDO::PARAM_STR);

        $stmt->execute();
    }

    public static function deleteById($id) {
        $db = DbConnect::getConnection();
        $stmt = $db->prepare("DELETE FROM schulklasse WHERE id = ?");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }

}
