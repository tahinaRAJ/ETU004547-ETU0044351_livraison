<?php 
namespace app\models;
use Flight;

class VehiculeModele {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getvoiture() {
        $stmt = $this->db->runQuery("SELECT * FROM tb_vehicules");
        return $stmt->fetchAll();
    }
    public function getTelephonebyid($id) {
        $stmt = $this->db->runQuery("SELECT * FROM tb_vehicules WHERE id = ?", [ $id ]);
        return $stmt->fetchAll();
    }


}
?>