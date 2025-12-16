<?php 
namespace app\models;
use Flight;

class LivreurModele {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getChauffeurs() {
        $stmt = $this->db->runQuery("SELECT * FROM tb_chauffeurs");
        return $stmt->fetchAll();
    }
    public function getChauffeursById($id) {
        $stmt = $this->db->runQuery("SELECT * FROM tb_chauffeurs WHERE id = ?", [ $id ]);
        return $stmt->fetchAll();
    }
}
?>