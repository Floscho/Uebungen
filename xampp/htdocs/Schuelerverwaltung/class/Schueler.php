<?php

class Schueler {

    private $id;
    private $vorname;
    private $nachname;
    private $schulklasse_id;

    function getId() {
        return $this->id;
    }

    function getVorname() {
        return $this->vorname;
    }

    function getNachname() {
        return $this->nachname;
    }

    function getSchulklasse_id() {
        return $this->schulklasse_id;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setVorname($vorname) {
        $this->vorname = $vorname;
    }

    function setNachname($nachname) {
        $this->nachname = $nachname;
    }

    function setSchulklasse_id($schulklasse_id) {
        $this->schulklasse_id = $schulklasse_id;
    }

    function __construct($vorname, $nachname, $schulklasse_id, $id = NULL) {
        if (!is_null($id)) {
            $this->id = $id;
        }
        $this->vorname = $vorname;
        $this->nachname = $nachname;
        $this->schulklasse_id = $schulklasse_id;
    }

    public static function getAll() {
        $db = DbConnect::getConnection();
        //sql statemant mit prepare statements
        $stmt = $db->prepare("SELECT vorname,nachname,name,schueler.id FROM schueler join schulklasse where schulklasse_id = schulklasse.id");
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $schueler = [];

        foreach ($rows as $row) {

            $schueler[] = new Schueler($row['vorname'], $row['nachname'], $row['name'], $row['id']);
        }
        return $schueler;
    }

    public static function getByLikeness($vorname, $nachname, $name) {
        $db = DbConnect::getConnection();
        //$suchstring etnhält den zu suchenden Teilstring
        //sql statment mit prepare statements
        $stmt = $db->prepare("SELECT * FROM schueler WHERE vorname LIKE ? OR nachname LIKE ? OR schulklasse_id LIKE ?");
        $stmt->bindValue(1, "%$vorname%", PDO::PARAM_STR);
        $stmt->bindValue(2, "%$nachname%", PDO::PARAM_STR);
        $stmt->bindValue(3, "%$name%", PDO::PARAM_STR);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $schueler = [];
        foreach ($rows as $row) {
            $schueler[] = new Schueler($row['vorname'], $row['nachname'], $row['schulklasse_id'], $row['id']);
        }
        return $schueler;
    }

    public static function getById($suchstring) {
        $db = DbConnect::getConnection();
        //$suchstring etnhält den zu suchenden Teilstring
        //sql statment mit prepare statements
        $stmt = $db->prepare("SELECT * FROM schueler WHERE id = ?");
        $stmt->bindValue(1, $suchstring, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
//echo $row['vorname']." ".$row['nachname']." ".$row['schulklasse_id']." ".$row['id']."<br />";
        $schueler = new Schueler($row['vorname'], $row['nachname'], $row['schulklasse_id'], $row['id']);

        return $schueler;
    }

    public static function insert(Schueler $s) {
        $db = DbConnect::getConnection();

        //sql statement mit prepare statements
        $stmt = $db->prepare("INSERT INTO schueler VALUES (Null, ?, ?, ?)");
        $stmt->bindValue(1, $s->getVorname(), PDO::PARAM_STR);
        $stmt->bindValue(2, $s->getNachname(), PDO::PARAM_STR);
        $stmt->bindValue(3, $s->getSchulklasse_id(), PDO::PARAM_INT);

        $stmt->execute();
    }

    public static function update(Schueler $s) {
        $db = DbConnect::getConnection();

        $stmt = $db->prepare("UPDATE schueler SET vorname=?, nachname=?, schulklasse_id=? WHERE id=?");
        $stmt->bindValue(1, $s->getVorname(), PDO::PARAM_STR);
        $stmt->bindValue(2, $s->getNachname(), PDO::PARAM_STR);
        $stmt->bindValue(3, $s->getSchulklasse_id(), PDO::PARAM_INT);
        $stmt->bindValue(4, $s->getId(), PDO::PARAM_INT);

        $stmt->execute();
    }

    public static function delete($ids) {
        $db = DbConnect::getConnection();
        $stmt = $db->prepare("DELETE FROM schueler WHERE id = ?");
        foreach ($ids as $id) {
            $stmt->bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
        }
        //sql statement mit prepare statements
    }

}
