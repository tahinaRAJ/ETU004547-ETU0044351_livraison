<?php 
class ZoneModele {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getZones() {
        $stmt = $this->db->runQuery("SELECT * FROM liv_zones");
        return $stmt->fetchAll();
    }
    public function getZoneById($id) {
        $stmt = $this->db->runQuery("SELECT * FROM liv_zones WHERE id = ?", [ $id ]);
        return $stmt->fetchAll();
    }
}

?>