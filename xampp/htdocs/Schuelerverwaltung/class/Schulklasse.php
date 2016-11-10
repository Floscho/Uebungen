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
    
    public static function getById($suchstring) {
        $db = DbConnect::getConnection();
        //$suchstring etnhält den zu suchenden Teilstring
        //sql statment mit prepare statements
        $stmt = $db->prepare("SELECT * FROM schulklasse WHERE id = ?");
        $stmt->bindValue(1, $suchstring, PDO::PARAM_INT);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
//echo $row['name'." ".$row['id']."<br />";
        $Schulklasse = new Schulklasse($row['name'], $row['id']);

        return $Schulklasse;
    }

    public static function insert(Schulklasse $k) {
        $db = DbConnect::getConnection();

        //sql statement mit prepared statements
        $stmt = $db->prepare("INSERT INTO schulklasse "
                . "VALUES(NULL,?)");
        $stmt->bindValue(1, $k->getName(), PDO::PARAM_STR);
        $stmt->execute();
    }
    public static function getNameById($id){
        return self::getById($id)->getName();
       
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
       
        $stmt = $db->prepare("UPDATE schulklasse SET name=? WHERE id=?");
        $stmt->bindValue(1, $k->getName(), PDO::PARAM_STR);
        $stmt->bindValue(2, $k->getId(), PDO::PARAM_STR);

        $stmt->execute();
    }

//    public static function delete($ids) {
//        $db = DbConnect::getConnection();
//        //http://www.mysqltutorial.org/mysql-on-delete-cascade/
//        //Aliase sind notwendig,
//        //ON DELETE CASCADE -> trotz REFERENZEN löschbar machen LÖSCHT DIE REFERENZEN MIT!!!!  
//        //alter TABLE `schueler` ADD CONSTRAINT `schueler_ibfk_2` FOREIGN KEY (`schulklasse_id`) REFERENCES `schulklasse` (`id`) ON DELETE CASCADE
//        $stmt = $db->prepare("DELETE sk, s FROM schueler s JOIN schulklasse sk ON s.schulklasse_id = sk.id WHERE s.schulklasse_id = ?");
//        //$stmt = $db->prepare("DELETE FROM schulklasse WHERE = ?");
//        
//        // Schueler::delete($ids);
//        foreach ($ids as $id) {
//            $stmt->bindValue(1, $id, PDO::PARAM_INT);
//            $stmt->execute();
//        }
//        
//    }
//    
    //delete Function löscht Schüler aus der Klasse und dann die gesamte Klasse 
    public static function delete($klassenIds) { //Bekommt Array mit KlassenIds übergeben
        $db = DbConnect::getConnection();
        foreach ($klassenIds as $klassenId) { 
            $schuelerIds = Schulklasse::getSchuelerIdsFromSchulklasse($klassenId);
            if($schuelerIds->count()>0) {
                echo 'Da sitzen noch Schüler in der Klasse!!!';
                Schulklasse::deleteSchueler($schuelerIds);
            } 
            Schulklasse::deleteSchulklasse($klassenIds);
        }
    }
    
    

    public static function deleteSchueler($ids) {
        foreach ($ids as $schuelerId) { 
                $stmt = $db->prepare("DELETE FROM schueler WHERE id = ?");
                $stmt->bindValue(1, $schuelerId['id'], PDO::PARAM_INT);
                $stmt->execute();
            }
    }

    public static function deleteSchulklasse($id) {
        // führt DELETE stmt zum löschen der Schulklasse aus
        $stmt = $db->prepare("DELETE FROM schulklasse WHERE id = ?");
        $stmt->bindValue(1, $id, PDO::PARAM_INT);
        $stmt->execute();
    }
    
    public static function getSchuelerIdsFromSchulklasse($klassenId) {
        $stmt = $db->prepare("Select id from schueler where schulklasse_id = ?");
        $stmt->bindValue(1, $klassenId, PDO::PARAM_INT); // übergibt die klassenId an das prepared Statement
        $stmt->execute(); // führt preparierten SQL Query aus
        $schuelerIds = $stmt->fetchAll(PDO::FETCH_ASSOC); // speichert das Ergebnis des Querys in SchuelerIds assoziativen Array

        return $schuelerIds;
    }  
    
    
    
}
