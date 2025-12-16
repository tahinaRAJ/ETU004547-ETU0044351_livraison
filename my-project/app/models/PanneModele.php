<?php 
namespace app\models;
use Flight;

class PanneModele {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getvoiture() {
        $stmt = $this->db->runQuery("SELECT * FROM tb_pannes");
        return $stmt->fetchAll();
    }
    public function getTelephonebyid($id) {
        $stmt = $this->db->runQuery("SELECT * FROM tb_pannes WHERE id = ?", [ $id ]);
        return $stmt->fetchAll();
    }
    public function getrentable(){
        
    }
}
?>