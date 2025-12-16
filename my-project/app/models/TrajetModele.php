<?php 
namespace app\models;
use Flight;

class TrajetModele {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }
    public function getTrajets() {
        $stmt = $this->db->runQuery("SELECT * FROM tb_trajets");
        return $stmt->fetchAll();
    }
    public function getTrajetsById($id) {
        $stmt = $this->db->runQuery("SELECT * FROM tb_trajets WHERE id = ?", [ $id ]);
        return $stmt->fetchAll();
    }
    public function getListeParJour($date = null) {

    $sql = "SELECT * FROM vue_trajets_par_jour";

    if ($date !== null) {
        $sql .= " WHERE jour = ?";
    }

    $sql .= " ORDER BY jour DESC";

    if ($date !== null) {
        $stmt = $this->db->runQuery($sql, [$date]);
    } else {
        $stmt = $this->db->runQuery($sql);
    }

    return $stmt->fetchAll();
}

    public function getBeneficeParJour($date = null) {
        $sql = "SELECT * FROM vue_benefice_par_jour";
        $params = [];
        if ($date !== null) {
            $sql .= " WHERE jour = ?";
            $params[] = $date;
        }
        $sql .= " ORDER BY jour DESC";
        $stmt = $this->db->runQuery($sql, $params);
        return $stmt->fetchAll();
    }

    public function getTrajetsRentablesParJour($date = null) {
        $sql = "SELECT * FROM vue_trajet_rentable_par_jour";
        $params = [];
        if ($date !== null) {
            $sql .= " WHERE jour = ?";
            $params[] = $date;
        }
        $sql .= " ORDER BY jour DESC";
        $stmt = $this->db->runQuery($sql, $params);
        return $stmt->fetchAll();
    }


    
}
?>