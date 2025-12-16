<?php

namespace app\controllers;

use flight\Engine;
use app\models\TrajetModele;
use Flight;

class ListeApiController {
    public function getListeParJour(){
        $TrajetModel = new TrajetModele(Flight::db());
        $date = Flight::request()->query->date ?? null;
        $trajets = $TrajetModel->getListeParJour($date);
        Flight::render('liste_par_jour', ['trajets' => $trajets]);
    }

	

}