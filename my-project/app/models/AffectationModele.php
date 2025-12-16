<?php 
namespace app\models;
use Flight;

class AffectationModele {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getParametres_salaire() {
        $stmt = $this->db->runQuery("SELECT * FROM liv_affectations");
        return $stmt->fetchAll();
    }
    public function getParametres_salaireById($id) {
        $stmt = $this->db->runQuery("SELECT * FROM liv_affectations WHERE id = ?", [ $id ]);
        return $stmt->fetchAll();
    }
    
}
?>