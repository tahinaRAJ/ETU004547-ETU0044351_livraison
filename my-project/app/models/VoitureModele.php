<?php 
namespace app\models;
use Flight;

class VoitureModele {
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
    public function getBeneficeParVehicule($vehicule_id) {
        // On récupère directement depuis la view
        $sql = "
            SELECT *
            FROM vue_benefice_par_vehicule
            WHERE vehicule_id = ?
        ";

        $stmt = $this->db->runQuery($sql, [$vehicule_id]);
        return $stmt->fetchAll();
    }

    public function getDisponibles($date = null) {
        // If a date is provided, filter against pannes on that date; else use the view (current date)
        if ($date !== null) {
            $sql = "SELECT v.id AS vehicule_id, v.marque, v.modele, v.versement_minimum
                    FROM tb_vehicules v
                    WHERE NOT EXISTS (
                        SELECT 1 FROM tb_pannes p
                        WHERE p.vehicule_id = v.id
                          AND p.date_debut_panne <= ?
                          AND (p.date_fin_panne IS NULL OR p.date_fin_panne >= ?)
                    )";
            $stmt = $this->db->runQuery($sql, [$date, $date]);
            return $stmt->fetchAll();
        }

        $stmt = $this->db->runQuery("SELECT * FROM vue_voitures_disponibles");
        return $stmt->fetchAll();
    }


}
?>