<?php 
namespace app\models;
use Flight;

class LivraisonModele{
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getLivraison() {
        $stmt = $this->db->runQuery("SELECT * FROM liv_livraisons");
        return $stmt->fetchAll();
    }
    public function getLivraisonById($id) {
        $stmt = $this->db->runQuery("SELECT * FROM liv_livraisons WHERE id = ?", [ $id ]);
        return $stmt->fetchAll();
    }
   

    
}
?>