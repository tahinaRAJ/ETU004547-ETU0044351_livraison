<?php 
namespace app\models;
use Flight;

class LivreurModele {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getLivreurs() {
        $stmt = $this->db->runQuery("SELECT * FROM liv_livreurs");
        return $stmt->fetchAll();
    }
    public function getLivreursById($id) {
        $stmt = $this->db->runQuery("SELECT * FROM liv_livreurs WHERE id = ?", [ $id ]);
        return $stmt->fetchAll();
    }
}
?>