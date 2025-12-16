<?php

namespace app\controllers;

use app\models\TrajetModele;
use Flight;

class BeneficeApiController {
    public function getBeneficeParJour() {
        $TrajetModel = new TrajetModele(Flight::db());
        $date = Flight::request()->query->date ?? null;
        $benefices = $TrajetModel->getBeneficeParJour($date);
        Flight::render('Benefice_Total', ['benefices' => $benefices]);
    }

    public function getTrajetsRentablesParJour() {
        $TrajetModel = new TrajetModele(Flight::db());
        $date = Flight::request()->query->date ?? null;
        $trajets = $TrajetModel->getTrajetsRentablesParJour($date);
        Flight::render('Trajets_Rentables', ['trajets' => $trajets]);
    }
}
?>