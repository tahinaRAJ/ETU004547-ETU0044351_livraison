<?php 
namespace app\models;
use Flight;

class Parametres_salaireModele {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getParametres_salaire() {
        $stmt = $this->db->runQuery("SELECT * FROM tb_parametres_salaire");
        return $stmt->fetchAll();
    }
    public function getParametres_salaireById($id) {
        $stmt = $this->db->runQuery("SELECT * FROM tb_parametres_salaire WHERE id = ?", [ $id ]);
        return $stmt->fetchAll();
    }
    public function getrentable(){
        
    }
}
?>